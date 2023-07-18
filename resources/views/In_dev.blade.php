{{-- CONTENTS --}}
@section('content')

    <div class="content-wrapper" style="min-height: 1416px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-8 pl-5">
                <h1>In Development</h1>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Under Dev Page</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="error-page">
            <h2 class="headline" style="color: #800000 !important;">:(</h2>

            <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i>   This page is in development</h3>

            <p>
            Unfortunately, because of out terror prof we could not display this page yet.
                Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
            </p>

            <form class="search-form">
                <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn" style="background-color: #800000 !important;"><i class="fas fa-search" style="color: #fff!important;"></i>
                    </button>
                </div>
                </div>
                <!-- /.input-group -->
            </form>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>

@endsection
