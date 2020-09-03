<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{'css/sidebar.css'}}" rel='stylesheet' type='text/css'>
    <link href="{{'css/finance.css'}}" rel='stylesheet' type='text/css'>

    <title>Finance</title>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="img/paperlogowhite.svg" alt="paper logo" class="mx-auto d-block paper-logo">
            </div>

            <ul style="margin-top: 52px; margin-left: 25px;" class="list-unstyled components">
                <li>
                    <a href="/dashboard">
                        <i style="margin-right:10px"><img src="img/finance.svg"></i>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/finance">
                        <i style="margin-right:10px"><img src="img/finance.svg"></i>
                        <span>Finance</span></a>
                </li>
            </ul>

        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="row">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>

                    </div>

                    <div class="row">

                        <div class="btn-group user-dropdown">
                            <button type="button" class="btn btn-user-dropdown" data-toggle="dropdown"
                                data-display="static" aria-haspopup="true" aria-expanded="false">
                                <i class="user-name"><img src="img/users.svg"
                                        style="margin-right: 10px;"></i>{{ Session::get('name')}}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                <div class="dropdown-item">
                                    <label>Name</label>
                                    <p>{{ Session::get('name')}}</p>
                                </div>
                                <div class="dropdown-item">
                                    <label>Last Login</label>
                                    <p>{{ Session::get('last_login')}}</p>
                                </div>
                                <div class="dropdown-item">
                                    <a class="dropdown-item" href="/logout">Logout</a>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </nav>

            <h3 class="page-title">FINANCE</h3>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#account" role="tab"
                        aria-controls="home" aria-selected="true">Account</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#transaction" role="tab"
                        aria-controls="profile" aria-selected="false">Transaction</a>
                </li>
            </ul>

            <div class="tab-content mt-3 ml-2" id="myTabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="home-tab">
                    All Finance Account
                    <div class="row mt-3">
                        <div class="col">

                            <input type="text" class="search-table-accout form-control" id="myInput" onkeyup="filter()"
                                placeholder="Search" title="Type in a name">
                        </div>
                        <div class="col">
                            <button type="button"
                                class="btn btn-primary btn-create-account button_create_account">Create New
                                Account</button>
                        </div>
                    </div>

                    <table class="table table-borderless mt-3" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Account Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Account Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finance_account as $index => $finance_accounts)
                            <tr>
                                <td hidden>{{ $finance_accounts['id'] }}</td>
                                <td>{{ $finance_accounts['name'] }}</td>
                                <td>{{ $finance_accounts['type'] }}</td>
                                <td>{{ $finance_accounts['Description'] }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle button_action_account"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item button_view_account" type="button"
                                                data-id="{{ $finance_accounts['id'] }}"
                                                data-name="{{ $finance_accounts['name'] }}"
                                                data-type="{{ $finance_accounts['type'] }}"
                                                data-desc="{{ $finance_accounts['Description'] }}">View</button>
                                            <button class="dropdown-item button_edit_account" type="button"
                                                data-id="{{ $finance_accounts['id'] }}"
                                                data-name="{{ $finance_accounts['name'] }}"
                                                data-type="{{ $finance_accounts['type'] }}"
                                                data-desc="{{ $finance_accounts['Description'] }}">Edit</button>
                                            <button class="dropdown-item button_delete_account" type="button"
                                                data-id="{{ $finance_accounts['id'] }}"
                                                data-name="{{ $finance_accounts['name'] }}">Delete</button>

                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="profile-tab">All Finance
                    Transactions

                    <div class="row mt-3">
                        <div class="col">

                            <input type="text" class="search-table-accout form-control" id="myInput" onkeyup="filter()"
                                placeholder="Search" title="Type in a name">
                        </div>
                        <div class="col">
                            <button type="button"
                                class="btn btn-primary btn-create-account button_create_transaction">Create New
                                Transaction</button>
                        </div>
                    </div>

                    <table class="table table-borderless mt-3" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Finance Account</th>
                                <th scope="col">Finance Account Name</th>
                                <th scope="col">Reference</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finance as $index => $finances)
                            <tr>
                                <td hidden>{{ $finances['created_at'] }}</td>
                                <td>{{ $finances['finance_account_type'] }}</td>
                                <td>{{ $finances['finance_account_name'] }}</td>
                                <td>{{ $finances['description'] }}</td>
                                <td>{{ $finances['debit_amount'] }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle button_action_account"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item button_view_account" type="button"
                                                data-id="{{ $finance_accounts['id'] }}"
                                                data-name="{{ $finance_accounts['name'] }}"
                                                data-type="{{ $finance_accounts['type'] }}"
                                                data-desc="{{ $finance_accounts['Description'] }}">View</button>
                                            <button class="dropdown-item button_edit_account" type="button"
                                                data-id="{{ $finance_accounts['id'] }}"
                                                data-name="{{ $finance_accounts['name'] }}"
                                                data-type="{{ $finance_accounts['type'] }}"
                                                data-desc="{{ $finance_accounts['Description'] }}">Edit</button>
                                            <button class="dropdown-item button_delete_account" type="button"
                                                data-id="{{ $finance_accounts['id'] }}"
                                                data-name="{{ $finance_accounts['name'] }}">Delete</button>

                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>


        </div>

    </div>

    <div class="modal fade" id="modal_create_accout" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body" style="margin:40px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="modal-finance-name">Create New Account</p>

                    <form method="post">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @csrf
                        <div class="form-group input-div">
                            <label for="exampleInputEmail1">Account Name<span style="color: red;">*</span></label>
                            <input type="text" class="input-form " id="account_name" aria-describedby="emailHelp"
                                placeholder="e.g. cash, bank, etc">

                        </div>
                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Type</label>
                            <input type="text" class="input-form" id="type" placeholder="e.g. cash/bank/ewallet">
                        </div>

                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="input-form" id="description">
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-simpan-account btn_simpan_account">Submit</button>
                            <button type="button" class="btn btn-batal-account">Batal</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_create_transaction" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body" style="margin:40px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="modal-finance-name">Create New Finance</p>

                    <form method="post">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @csrf
                        <div class="form-group input-div">
                            <label for="exampleInputEmail1">Finance Name<span style="color: red;">*</span></label>
                            <input type="text" class="input-form " id="finance_name_transaction" aria-describedby="emailHelp"
                                placeholder="e.g. cash, bank, etc">

                        </div>
                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Finance Account</label>
                            <select class="custom-select input-form" id="finance_account_modal_select">
                                <option value="" class="placeholder " disabled selected>Select your option</option>
                                @foreach ($finance_account as $index => $finance_accounts)
                                <option value="{{ $finance_accounts['id'] }}">{{ $finance_accounts['name'] }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="input-form" id="finance_account"
                                placeholder="e.g. cash/bank/ewallet"> -->
                        </div>

                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Amount</label>
                            <input type="text" class="input-form" id="amount_transaction">
                        </div>

                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="input-form" id="description_transaction">
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn_simpan_account btn_create_transaction_modal">Submit</button>
                            <button type="button" class="btn btn-batal-account">Batal</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_accout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body" style="margin:40px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="modal-finance-name">Edit Account</p>

                    <form method="patch">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @csrf
                        <div class="form-group input-div">
                            <label for="exampleInputEmail1">Account Name<span style="color: red;">*</span></label>
                            <input type="text" class="input-form " id="account_name_edit" aria-describedby="emailHelp"
                                placeholder="e.g. cash, bank, etc">
                            <label class="modal-finance-name" hidden id="account_id_modal_edit"
                                style="color: #FFFFFF; font-weight:100; font-size: 18px;"></label>

                        </div>
                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Type</label>
                            <input type="text" class="input-form" id="type_edit" placeholder="e.g. cash/bank/ewallet">
                        </div>

                        <div class="form-group input-div">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="input-form" id="description_edit">
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-simpan-account_edit">Simpan</button>
                            <button type="button" class="btn btn-batal-account">Batal</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_view_accout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body" style="margin:40px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="modal-finance-name">View Account</p>

                    <form method="post">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account Name<span style="color: red;">*</span></label>
                            <label for="exampleInputPassword1" id="account_name_view"
                                style="font-size: 16px; color:#12405D; font-weight:lighter;"></label>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Type</label>
                            <label for="exampleInputPassword1" id="account_type_view"
                                style="font-size: 16px; color:#12405D; font-weight:lighter;"></label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <label for="exampleInputPassword1" id="account_desc_view"
                                style="font-size: 16px; color:#12405D; font-weight:lighter;"></label>
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-okay-account btn-batal-account">Okay</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_accout" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #3B98D4;">

                <div class="modal-body" style="margin:40px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="justify-content-center mb-4">
                        <div class="row">
                            <label class="modal-finance-name"
                                style="color: #FFFFFF; font-weight:100; font-size: 18px; margin-right:5px;">Delete</label>
                            <label class="modal-finance-name" id="account_name_modal"
                                style="color: #FFFFFF; font-weight:100; font-size: 18px;"></label>
                            <label class="modal-finance-name" hidden id="account_id_modal"
                                style="color: #FFFFFF; font-weight:100; font-size: 18px;"></label>
                        </div>

                        <label class="modal-finance-name" style="color: #FFFFFF; font-weight:100; font-size: 14px;">Are
                            you sure? </label>
                    </div>

                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-delete-account button_delete_account_modal">Delete</button>
                        <button type="button" class="btn btn-cancel-account button_cancel_account">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });

    function filter() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    $(document).on('click', '.button_edit_account', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var type = $(this).data('type');
        var desc = $(this).data('desc');

        $("#account_name_edit").val(name);
        $("#type_edit").val(type);
        $("#description_edit").val(desc);
        $("#account_id_modal_edit").html(id);

        $('#modal_edit_accout').modal('show');
    });

    $(document).on('click', '.button_view_account', function () {
        var name = $(this).data('name');
        var type = $(this).data('type');
        var desc = $(this).data('desc');

        $("#account_name_view").html(name);
        $("#account_type_view").html(type);
        $("#account_desc_view").html(desc);

        $('#modal_view_accout').modal('show');
    });

    $(document).on('click', '.button_delete_account', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');

        $("#account_name_modal").html(name);
        $("#account_id_modal").html(id);

        $('#modal_delete_accout').modal('show');
    });

    $(document).on('click', '.btn-okay-account', function () {
        $('#modal_view_accout').modal('toggle');
    });

    $(document).on('click', '.button_cancel_account', function () {
        $('#modal_delete_accout').modal('toggle');
    });

    $(document).on('click', '.button_create_account', function () {
        $('#modal_create_accout').modal('show');
    });

    $(document).on('click', '.button_create_transaction', function () {
        $('#modal_create_transaction').modal('show');
    });


    $(document).on('click', '.btn_create_transaction_modal', function () {
        var title = $('#finance_name_transaction').val();
        var debit_amount = $('#amount_transaction').val();
        var credit_amount = $('#amount_transaction').val();
        var description = $('#description_transaction').val();
        var finance_account_id = $('#finance_account_modal_select option:selected').val();

        console.log(title);
        console.log(debit_amount);
        console.log(credit_amount);
        console.log(description);
        console.log(finance_account_id);

        $.ajax({
            url: "/create-finance",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'title': title,
                'debit_amount': debit_amount,
                'credit_amount': credit_amount,
                'description': description,
                'finance_account_id': finance_account_id,
            },

            success: function (data) {
                var hasil = data;
                console.log(hasil);
                if (hasil == 'true') {
                    alert('Anda berhasil menambahkan akun baru');
                    window.location.href = "/finance";
                    // $('#modalPenilaianUTS').modal('toggle');
                }
                // window.location.href = "/penilaian_asrama";
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('Silahkan lengkap data terlebih dahulu! Pastikan semua data terisi!');
            },
        });

    });

    $(document).on('click', '.btn-simpan-account_edit', function () {
        var account_name = $("#account_name_edit").val();
        var type = $("#type_edit").val();
        var description = $("#description_edit").val();
        var id = $("#account_id_modal_edit").html();

        console.log(account_name);
        console.log(type);
        console.log(description);
        console.log(id);

        $.ajax({
            url: "/update-finance-account",
            type: "patch",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': id,
                'names': account_name,
                'descriptions': description,
                'types': type,
            },

            success: function (data) {
                var hasil = data;
                console.log(hasil);
                if (hasil == 'true') {
                    alert('Anda berhasil mengupdate akun');
                    window.location.href = "/finance";
                    // $('#modalPenilaianUTS').modal('toggle');
                }
                // window.location.href = "/penilaian_asrama";
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('Silahkan lengkap data terlebih dahulu! Pastikan semua data terisi!');
            },
        });

    });


    $(document).on('click', '.btn-simpan-account', function () {
        var account_name = $('#account_name').val();
        var type = $('#type').val();
        var description = $('#description').val();

        console.log(account_name);
        console.log(type);
        console.log(description);

        $.ajax({
            url: "/create-finance-account",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'names': $('#account_name').val(),
                'descriptions': $('#description').val(),
                'types': $('#type').val(),
            },

            success: function (data) {
                var hasil = data;
                console.log(hasil);
                if (hasil == 'true') {
                    alert('Anda berhasil menambahkan akun baru');
                    window.location.href = "/finance";
                    // $('#modalPenilaianUTS').modal('toggle');
                }
                // window.location.href = "/penilaian_asrama";
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('Silahkan lengkap data terlebih dahulu! Pastikan semua data terisi!');
            },
        });

    });

    $(document).on('click', '.button_delete_account_modal', function () {
        var id = $("#account_id_modal").html();

        console.log(id);

        $.ajax({
            url: "/delete-finance-account",
            type: "delete",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'id': id,
            },

            success: function (data) {
                var hasil = data;
                console.log(hasil);
                if (hasil == 'true') {
                    alert('Anda berhasil menghapus akun');
                    window.location.href = "/finance";
                    // $('#modalPenilaianUTS').modal('toggle');
                }
                // window.location.href = "/penilaian_asrama";
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('');
            },
        });



    });

</script>

</html>
