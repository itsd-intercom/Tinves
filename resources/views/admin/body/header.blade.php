<style>
    @media (min-width: 768px) {
    /* Posisi tombol menu vertical ke paling kiri */
    #vertical-menu-btn {
        float: left;
    }
    .user-name {
        display: none;
    }
    #result {
    top: 100%;
    left: 0;
}
}

/* Gaya untuk perangkat mobile */
@media (max-width: 767px) {
    /* Posisi tombol menu vertical sesuai kebutuhan untuk mobile */
    #vertical-menu-btn {
        /* Anda dapat menambahkan aturan CSS khusus di sini */
    }
    .user-name {
        display: none ;
    }
}
</style>

<header id="page-topbar">

    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="/dashboard" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="logo/favicon.png"  alt="logo-light" height="75">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn" >
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- Search berdasarkan user -->
            <div class="dropdown">
                <form class="app-search d-none d-lg-block" action="" method="GET">
                    {{ csrf_field() }}
                    <div class="position-relative">
                        <input type="text" name="seach" class="form-control" placeholder="Search Users" id="search">
                        <span class="ri-search-line"></span>
                    </div>
                </form>
                <div id="result" class="panel panel-default" style="display: none; position: absolute; width: 100%; z-index: 100; background-color: white; border">
                    <ul class="list-group" id="memlist"></ul>
                </div>
            </div>

        </div>

        <div class="d-flex">
             <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-apps-2-line"></i>
                </button>


                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    <div class="d-flex align-items-center border-bottom p-3">
                        <h6 class="mb-0">Browse apps</h6>
                    </div>

                    <div class="px-lg-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://myintercom.my.id/" target="_blank">
                                    <img src="{{ asset('logo/myintercom.png') }}" width="" alt="Myintercom">
                                    <span>MyIntercom</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://login.umbrella.com/umbrella/?return_to=https%3A%2F%2Fdashboard.umbrella.com%2Fo%2F7965002%2F/" target="_blank">
                                    <img src="{{ asset('logo/cisco.png') }}" width="50%" alt="bitbucket">
                                    <span>Umbrella</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://unifi.ui.com/network-servers/" target="_blank">
                                    <img src="{{ asset('logo/unifi.png') }}" alt="dribbble">
                                    <span>Unifi</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://auth.apjc.amp.cisco.com/sso/new?RelayState=%7B%22inbound_path%22%3A%22%2Fcompromises%22%7D&SAMLRequest=lZJNa8MwDIbv%2BxXB93ynaWvSQFgZFLoxuo%2FDLkN1VOoR25nl7OPfz00Z6w4r7CrpeSW9UkWgup43g9vrDb4OSC74UJ0mPiYWbLCaGyBJXINC4k7wu%2BZ6zbMo4b01zgjTsRPkPAFEaJ00mgWr5YI9p%2Bm2zGE7D6dJtg2LcjcNoRBFOJ0hTPJyBiXOWfCIljyzYF7Cg0QDrjQ50M6HkiwPk0mYp%2FdJwbMJz9InFiz9HlKDG6m9cz3xOAa%2FZAT9i4hA9ZGQJEwkjIoJ6SAfa3xnQfM94aXRNCi0d2jfpMCHzfpHSfic6fCMGMUgiNXVwRI%2BTmzr%2F9AKHbTgoIpPFarjtW68r6vlremk%2BAyujFXg%2FrY9jdIxIttwN5ZyVCC7pm2tb8bi%2Btji9w%2FUF18%3D/" target="_blank">
                                    <img src="{{ asset('logo/amp.png') }}" alt="dribbble">
                                    <span>AMP</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://subsystem.indihome.co.id/prepaid-system/sisakuota?gclid=Cj0KCQjwi7GnBhDXARIsAFLvH4lCpaw56wUZ-wDfy8jEpgjp0sCq-1XcV5l4VD9cuYMIVKFUMksWYJkaAknUEALw_wcB/" target="_blank">
                                    <img src="{{ asset('logo/indihome.png') }}" alt="dribbble">
                                    <span>Cek FUP</span>
                                </a>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user ri-account-circle-fill" src="assets/images/users/avatar-2.jpeg" alt="Header Avatar">
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item"><i class="fas fa-user-circle align-middle me-1"></i> {{ Auth::user()->name ?? '' }}</a>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Javascript search user  menggunakan result-->
<script>
    $(document).ready(function () {
        $('#search').on('input', function () {
            var query = $(this).val();

            if (query.length >= 3) {
                $.ajax({
                    url: '/search-users',
                    method: 'GET',
                    data: { query: query },
                    success: function (response) {
                        if (response.length > 0) {
                            displayResults(response);
                        } else {
                            hideResults();
                        }
                    },
                    error: function () {
                        hideResults();
                    }
                });
            } else {
                hideResults();
            }
        });

        function displayResults(results) {
            var resultList = $('#memlist');
            resultList.empty();

            $.each(results, function (index, user) {
                var listItem = $('<li class="list-group-item"></li>')
                    .text(user.name)
                    .click(function () {
                        window.location.href = '/userDetail-' + user.id;
                    });

                resultList.append(listItem);
            });

            $('#result').show();
        }

        function hideResults() {
            $('#result').hide();
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="query"]');
        const searchResultsContainer = document.getElementById('searchResults');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.trim();

            if (query.length === 0) {
                searchResultsContainer.innerHTML = '';
                return;
            }

            // Lakukan permintaan AJAX untuk mendapatkan hasil pencarian
            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(results => {
                    renderSearchResults(results);
                })
                .catch(error => console.error(error));
        });

        function renderSearchResults(results) {
            if (results.length === 0) {
                searchResultsContainer.innerHTML = 'No results found.';
                return;
            }

            const resultList = document.createElement('ul');

            results.forEach(user => {
                const listItem = document.createElement('li');
                listItem.textContent = user.name;
                listItem.addEventListener('click', function() {
                    // Arahkan pengguna ke halaman detail pengguna berdasarkan nama
                    window.location.href = `/user/${user.id}`; // Sesuaikan dengan rute dan parameter yang sesuai
                });

                resultList.appendChild(listItem);
            });

            // Tampilkan hasil pencarian di bawah formulir
            searchResultsContainer.innerHTML = '';
            searchResultsContainer.appendChild(resultList);
        }
    });
</script>
