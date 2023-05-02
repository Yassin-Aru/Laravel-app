@extends('layouts.body')
@section('homeItem')
style="display:none;"
@endsection
@section('stagiaireItem')
style="display:none;"
@endsection

@section('profileUser')
Teacher
@endsection

@section('content')
<select class="form-select form-select-md mb-4" aria-label=".form-select-lg example">
  <option selected>Select Group</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="4">Four</option>
  <option value="5">Five</option>
  <option value="6">Six</option>
</select>

<table class="table">
  <thead>
    <tr>
        <th scope="col" class="text-center">id</th>
        <th scope="col" class="text-center">nom&prenom</th>
      <th scope="col" class="text-center">08:30->11:00</th>
      <th scope="col" class="text-center">11:00->01:30</th>
      <th scope="col" class="text-center">01:30->16:00</th>
      <th scope="col" class="text-center">16:00->18:30</th>
      <th scope="col" class="text-center">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row" class="text-center">1</th>
        <td class="text-center">Stagiaire Name</td>
        <td class="text-center">
                <input type="checkbox">
        </td>
        <td class="text-center">
                <input type="checkbox">
        </td>
        <td class="text-center">
                <input type="checkbox">
        </td>
        <td class="text-center" >
                <input type="checkbox">
        </td>
        <td class="text-center">
            <span class="badge rounded-pill text-bg-success p-2">Normal</span>
        </td>
    </tr><tr>
        <th scope="row" class="text-center">2</th>
        <td class="text-center">Stagiaire Name</td>
        <td class="text-center">
                <input type="checkbox">
        </td>
        <td class="text-center">
                <input type="checkbox">
        </td>
        <td class="text-center">
                <input type="checkbox">
        </td>
        <td class="text-center" >
                <input type="checkbox">
        </td>
        <td class="text-center">
            <span class="badge rounded-pill text-bg-success p-2">Normal</span>
        </td>
    </tr>
  </tbody>
</table>
@endsection
