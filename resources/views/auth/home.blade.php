@extends('layouts.body')

@section('homeUrl')
{{route('auth.adminHome')}}
@endsection

@section('absenceUrl')
{{route('auth.adminAbsence')}}
@endsection

@section('homeItem')
@endsection
@section('stagiaireItem')
style="display:none;"
@endsection

@section('profileUser')
Admin
@endsection

@section('content')

<!-- Prof Section -->
<div class="jumbotron p-2 rounded mb-3" style="background-color:#eee;">
    <h1 class="display-6">New Prof!</h1>
    <p class="lead">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, eros at imperdiet. 
    </p>
    <p class="lead">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Prof
        </button>
    </p>
</div>


<!-- Stagiaire Group Section -->

<div class="jumbotron p-2 rounded mb-3" style="background-color:#eee;">
    <h1 class="display-6">New Group!</h1>
    <p class="lead">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, eros at imperdiet. 
    </p>
    <p class="lead">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#groupModal">
            Create Group
        </button>
    </p>
</div>




<!-- Stagiaires  Section -->

<div class="jumbotron p-2 rounded mb-3" style="background-color:#eee;">
    <h1 class="display-6">New Stagiaire!</h1>
    <p class="lead">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam molestie, eros at imperdiet. 
    </p>
    <p class="lead">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#stagiareModal">
            Add Stagiaire
        </button>
    </p>
</div>




<!-- Stagiaire Group Modal -->
<div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="groupModal">Add Group</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form>
                <div class="row mb-3">
                    <label for="grpName" class="col-sm-2 col-form-label">Group Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="grpName">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grpField" class="col-sm-2 col-form-label">Group Fireld</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grpField">
                            <option selected>Choose...</option>
                            <option value="1">Dev</option>
                            <option value="2">Infr</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grpLevel" class="col-sm-2 col-form-label">Group Level</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grpLevel">
                            <option selected>Choose...</option>
                            <option value="1">1st year</option>
                            <option value="2">2nd year</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Add Stagiaire</button>
            </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Stagiaire Modal -->
<div class="modal fade" id="stagiareModal" tabindex="-1" aria-labelledby="stagiareModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="stagiareModal">Add Stagiaire</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form>
                <div class="row mb-3">
                    <label for="ctf" class="col-sm-2 col-form-label">CTF</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ctf">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullName">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phoneNumber" class="col-sm-2 col-form-label">Tel</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneNumber">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="birthDate" class="col-sm-2 col-form-label">Birth Date</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="birthDate">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grp" class="col-sm-2 col-form-label">Choose Group</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grp">
                            <option selected>Choose...</option>
                            <option value="1">Dev</option>
                            <option value="2">Infr</option>
                            <option value="3">Dev</option>
                            <option value="4">Infr</option>
                            <option value="5">Dev</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Add Stagiaire</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Prof Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Prof</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form>
                <div class="form-group mb-2">
                    <label for="profFullName">Full Name</label>
                    <input type="text" class="form-control" id="profFullName" aria-describedby="profName" placeholder="Enter Full Name">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password for this Prof">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
</div>

@endsection
