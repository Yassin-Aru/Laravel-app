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
        <th scope="col" class="text-center">Days</th>
        <th scope="col" class="text-center">Hours</th>
        <th scope="col" class="text-center">Seances</th>
        <th scope="col" class="text-center">Aut</th>
        <th scope="col" class="text-center">CM</th>
        <th scope="col" class="text-center">Note</th>
        <th scope="col" class="text-center">Status</th>
        <th scope="col" class="text-center">Edit</th>
        <th scope="col" class="text-center">info</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row" class="text-center">1</th>
        <td class="text-center">Stagiaire Name</td>
        <td class="text-center">
            0
        </td>
        <td class="text-center">
            0
        </td>
        <td class="text-center">
            0
        </td>
        <td class="text-center">
            0
        </td>
        <td class="text-center">
            0
        </td>
        <td class="text-center">
            0
        </td>
        <td class="text-center">
            <span class="badge rounded-pill text-bg-success p-2">normal</span>
        </td>
        <td class="text-center">
        <button class="btn btn-info  btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit" aria-controls="edit">edit</button>
        </td>
        <td class="text-center">
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            more
        </button>
        </td>
    </tr>
  </tbody>
</table>


<!-- THis one is for the details offcanvnas the aria-labelledby is the attr that explain this  -->

<div class="offcanvas offcanvas-end w-75" tabindex="-1" id="edit" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Edit Stagiaire Details</h5>
        <button type="button" class="btn-close bg-info" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputText" class="form-label">Nom</label>
                <input type="text" class="form-control " id="inputText">
            </div>
            <br />
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="inputText4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Telephone</label>
                <input type="text" class="form-control" id="inputText4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail2">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Stagiaire Address">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Status</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>Normal</option>
                    <option>Status 1</option>
                    <option>Status 2</option>
                    <option>Status 3</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Absence History</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Seance</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col" class="text-center">Teacher</th>
                            <th scope="col" class="text-center">Status</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"  class="text-center">1</th>
                                <td class="text-center">1st Seance</td>
                                <td class="text-center">11-11-2023</td>
                                <td class="text-center">Prof Name</td>
                                <td class="text-center">CM</td>
                            </tr>
                            <tr>
                                <th scope="row"  class="text-center">1</th>
                                <td class="text-center">1st Seance</td>
                                <td class="text-center">11-11-2023</td>
                                <td class="text-center">Prof Name</td>
                                <td class="text-center">-</td>
                            </tr>
                            <tr>
                                <th scope="row"  class="text-center">1</th>
                                <td class="text-center">1st Seance</td>
                                <td class="text-center">11-11-2023</td>
                                <td class="text-center">Prof Name</td>
                                <td class="text-center">Aut</td>
                            </tr>
                            <tr>
                                <th scope="row"  class="text-center">1</th>
                                <td class="text-center">1st Seance</td>
                                <td class="text-center">11-11-2023</td>
                                <td class="text-center">Prof Name</td>
                                <td class="text-center">-</td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
@endsection
