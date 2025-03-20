@extends('layouts.admin')
@section('title')
    Principal
@endsection
@section('content')
    <h1 class="title">Bienvenido {{ Auth::user()->name }} </h1>
    <hr>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/roles')}}" class="info-box-icon bg-info">
                    <span ><i class="bi bi-person-fill"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Roles</span>
                    <span class="info-box-number">Total: {{$total_roles}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/usuarios')}}" class="info-box-icon bg-success">
                    <span ><i class="fa fa-users"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number">Total: {{$total_usuarios}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/categorias')}}" class="info-box-icon bg-primary">
                    <span ><i class="fa fa-tags"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number">Total: {{$total_categorias}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/productos')}}" class="info-box-icon bg-warning">
                    <span ><i class="fa fa-list"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Productos</span>
                    <span class="info-box-number">Total: {{$total_productos}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/productos')}}" class="info-box-icon bg-secondary">
                    <span ><i class="bi bi-people-fill"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Proveedores</span>
                    <span class="info-box-number">Total: {{$total_proveedores}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/productos')}}" class="info-box-icon bg-danger">
                    <span ><i class="bi bi-cart4"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Compras</span>
                    <span class="info-box-number">Total: {{$total_compras}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/clientes')}}" class="info-box-icon bg-dark">
                    <span ><i class="bi bi-person-raised-hand"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Clientes</span>
                    <span class="info-box-number">Total: {{$total_clientes}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/ventas')}}" class="info-box-icon bg-info">
                    <span ><i class="bi bi-currency-exchange"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Ventas</span>
                    <span class="info-box-number">Total: {{$total_ventas}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>



        

    </div>
    
    
@endsection

