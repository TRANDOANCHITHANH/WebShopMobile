<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Guest\Home\HomeService;
use App\Services\Guest\Order\OrderService;
use App\Http\Requests\Account\AccountRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Guest\Account\AccountService;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }
    public function index(Request $request)
    {
        // dd(session()->get('infocusomer'));
        if (session()->has('infocusomer') && $request->vnp_ResponseCode == '00') {
            OrderService::getInstance()->create(new Request(session()->get('infocusomer')));
            session()->forget('infocusomer');
        }
        $customer = $this->accountService->findCustomer();
        $notification = $this->accountService->getNotification();
        $listOrder = OrderService::getInstance()->getOrders();
        return view('guest.account.index', compact('customer', 'notification', 'listOrder'));
    }

    public function update(AccountRequest $request)
    {

        $response =  $this->accountService->update($request);
        if (isset($response['error'])) {
            return redirect()->back()->with('error', 'Cập nhật thông tin không thành công');
        } else {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
        }
    }
    public function showChanepassForm()
    {
        return view('auth.passwords.change');
    }
    public function changePass(ChangePasswordRequest $request)
    {
        $this->accountService->update_password(Auth::user(), $request->new_password);

        return redirect()->back()->with('success', 'Mật khẩu đã được cập nhật thành công!');
    }
}
