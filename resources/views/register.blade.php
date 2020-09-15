@extends('layout')

@section('content')
<div>
<h1>User Register page </h1>
<div class="col-sm-6">
<form action="register" method="post">
@csrf

  <div class="form-group">
    <label >Name</label>
    <input type="text"  name="name" class="form-control"   placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label >Email</label>
    <input type="text"  name="email" class="form-control"   placeholder="Enter Email">
  </div>

  <div class="form-group">
    <label >Password</label>
    <input type="password"  name="password" class="form-control"   placeholder="Enter password">
  </div>

  <div class="form-group">
    <label >Contact</label>
    <input type="text"  name="contact" class="form-control"   placeholder="Enter Contact Number">
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>
@stop