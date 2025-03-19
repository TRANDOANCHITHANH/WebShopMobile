<div class="col-lg-3 d-none d-lg-block">
    <nav class="navbar navbar-vertical navbar-light bg-light border" id="navbar-vertical">
        <div class="navbar-nav w-100">
            @foreach ($categories as $category)
            @if ($category['parent_id'] == 0)
            <div class="nav-item dropright">
                <a href="#" class="nav-link parent-category">
                    {{ $category['name'] }}
                    <i class="fa fa-angle-right float-right mt-1"></i>
                </a>
                @if (!empty($category['children']))
                <div class="dropdown-menu">
                    <div class="dropdown-menu-header">
                        <h6>Thương hiệu nổi bật</h6>
                        <button class="btn btn-close">&times;</button>
                    </div>
                    <div class="dropdown-menu-content">
                        @foreach ($category['children'] as $item)
                        <a href="#" class="dropdown-item">
                            <span>{{ $item['name'] }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif
            @endforeach
        </div>
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let dropdowns = document.querySelectorAll(".dropright");

        dropdowns.forEach(function(dropdown) {
            let menu = dropdown.querySelector(".dropdown-menu");
            let closeBtn = menu?.querySelector(".btn-close");

            dropdown.addEventListener("mouseenter", function() {
                if (menu) {
                    menu.style.display = "block";
                }
            });

            dropdown.addEventListener("mouseleave", function() {
                if (menu) {
                    menu.style.display = "none";
                }
            });

            if (closeBtn) {
                closeBtn.addEventListener("click", function() {
                    menu.style.display = "none";
                });
            }
        });
    });
</script>