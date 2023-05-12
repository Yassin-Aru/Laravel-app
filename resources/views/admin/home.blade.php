@extends('layouts.body')


@section('homeItem')
style="display:none;"
@endsection

@section('style')
<style>
  #myTable tbody {
    display: none;
  }
</style>
@endsection


@section('absenceUrl')
{{route('admin.adminHome')}}
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

<!-- Adding three buttons in the top of admin's home  -->

<div class="d-grid gap-2 d-md-flex  mb-3">
    <button type="button" class="btn btn-primary me-md-2" data-bs-toggle="modal" data-bs-target="#profModall">
        Add Prof
    </button>
    <button type="button" class="btn btn-info me-md-2" data-bs-toggle="modal" data-bs-target="#groupModal">
        Create Group
    </button>

    <button type="button" class="btn btn-success me-md-2" data-bs-toggle="modal" data-bs-target="#seanceModel">
        Create Seance
    </button>

    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#stagiareModal">
        Add Stagiaire
    </button>
</div>

<!-- THe content of the page -->



<h1 class="display-6"><strong>Absence Dashboard</strong></h1>
<select class="form-select form-select-md mb-4" id="groupSelect">
  <option selected>Select Group</option>
  @if(isset($groups))
        @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
    @endif
</select>

<table class="table" id="myTable">
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
  @foreach ($stagiaires as $stagiaire)
    <tr data-group-id="{{$stagiaire->group_id}}">
        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
        <td class="text-center">{{ $stagiaire->nom . ' ' . $stagiaire->prenom }}</td>
        <td class="text-center">0</td>
        <td class="text-center">0</td>
        <td class="text-center">0</td>
        <td class="text-center">0</td>
        <td class="text-center">0</td>
        <td class="text-center">0</td>
        
        <td class="text-center">
            <span class="badge rounded-pill text-bg-success p-2">{{ optional($stagiaire->status)->status_nom }}
</span>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-warning btn-sm edit-btn" 
            data-ctf="{{$stagiaire->ctf}}" 
            data-nom="{{$stagiaire->nom}}" 
            data-prenom="{{$stagiaire->prenom}}" 
            data-email="{{$stagiaire->email}}" 
            data-telephone="{{$stagiaire->telephone}}" 
            data-birthDate="{{$stagiaire->birthDate}}" 
            data-group="{{$stagiaire->group_id}}" 
            data-status="{{$stagiaire->status_id}}"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
                edit
            </button>
        </td>
        <td class="text-center">
            <button class="btn btn-info  btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit" aria-controls="edit">more</button>
        </td>
    </tr>
    @endforeach

  </tbody>
</table>


<!-- THis one is for the details offcanvnas the aria-labelledby is the attr that explain this  -->

<div class="offcanvas offcanvas-end w-75" tabindex="-1" id="edit" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">History</h5>
        <button type="button" class="btn-close bg-info" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Seance</th>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">Teacher</th>
                <th scope="col" class="text-center">Excuse</th>
                <th scope="col" class="text-center"></th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($absences as $absence)
                
                    @csrf
                    <tr>
                        <th scope="row"  class="text-center">1</th>
                        <td class="text-center">{{$absence->seance_id}}</td>
                        <td class="text-center">{{$absence->abs_date}}</td>
                        <td class="text-center">Prof Name</td>
                        <td class="text-center">{{ optional($absence->excuse)->excuse_type }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#statusEditModal">
                                edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->
    </div>
</div>






<!-- Excuse Edit Model -->


<!-- Modal -->
<div class="modal fade" id="statusEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="statusEditModalLabel">Excuse Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('update_excuse', $absence->id) }}" method="POST">
        @csrf 
            <div class="modal-body">
            <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="excuse_Up" name="excuse_id">
                                    <option selected disabled>Select Status</option>
                                    @if(isset($excuses))
                                        @foreach($excuses as $excuse)
                                            <option value="{{$excuse->id}}">{{$excuse->excuse_type}}</option>
                                        @endforeach
                                    @endif
                                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">update</button>
            </div>
        </form>
    </div>
  </div>
</div>




<!-- Modal -->




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Stagiaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"  id="updateForm" >
                @if(isset($stagiaire))
                    <form action="{{ route('update_stagiaire', $stagiaire->id) }}" method="POST">
                    @csrf
                        <div class="row mb-3">
                            <label for="ctf_Up" class="col-sm-2 col-form-label">CTF</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="ctf_Up" name="ctf" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom_Up" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom_Up" name="nom" value="{{$stagiaire->nom}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prenom_Up" class="col-sm-2 col-form-label">Prenom</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="prenom_Up" name="prenom"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email_Up" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" id="email_Up" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phoneNumber" class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" name="telephone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="birthDate_Up" class="col-sm-2 col-form-label">Birth Date</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthDate_Up" name="birthDate">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="grp_Up" class="col-sm-2 col-form-label">Choose Group</label>
                            <div class="col-sm-10">
                                <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grp_Up" name="group_id">
                                    <option selected>Choose...</option>
                                    @if(isset($groups))
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status_Up" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="status_Up" name="status_id">
                                    <option selected disabled>Select Status</option>
                                    @if(isset($statuses))
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->status_nom}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">update info</button>
                    </form>
                    @endif
                </div>
            </div>
    </div>
</div>





<!-- Modals for Prof, Group, Stagiaire -->
<!-- Stagiaire Group Modal -->
<div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="groupModal">Add Group</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="{{ route('group.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="grpName" class="col-sm-2 col-form-label">Group Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="grpName" name="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grpField" class="col-sm-2 col-form-label">Group Field</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grpField" name="field">
                            <option selected>Choose...</option>
                            <option value="dev">Dev</option>
                            <option value="infr">Infr</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grpLevel" class="col-sm-2 col-form-label">Group Level</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grpLevel" name="level">
                            <option selected>Choose...</option>
                            <option value="1st_year">1st year</option>
                            <option value="2nd_year">2nd year</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Add Group</button>
            </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
</div>


<!-- Seance Model -->

<div class="modal fade" id="seanceModel" tabindex="-1" aria-labelledby="seanceModel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="seanceModel">Add Seance</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="{{ route('seance.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="seance_date" class="col-sm-2 col-form-label">Seance date</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="seance_date" name="seance_date">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="seance_hour" class="col-sm-2 col-form-label">Seance hour</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="seance_hour" name="seance_hour">
                            <option selected disabled>Choose...</option>
                            <option value="1">08:30->11:00</option>
                            <option value="2">11:00->01:30</option>
                            <option value="12">08:30->01:30</option>
                            <option value="3">01:30->16:00</option>
                            <option value="4">16:00->18:30</option>
                            <option value="34">01:30->18:30</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grp" class="col-sm-2 col-form-label">Select Group</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grp" name="group_id">
                            <option selected disabled>Choose...</option>
                            @if(isset($groups))
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Create Seance</button>
            </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <form action="{{ route('stagiaire.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="ctf" class="col-sm-2 col-form-label">CTF</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ctf" name="ctf">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullName" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullName" name="nom">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullName" class="col-sm-2 col-form-label">Prenom</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullName" name="prenom"> 
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phoneNumber" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneNumber" name="telephone">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="birthDate" class="col-sm-2 col-form-label">Birth Date</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="birthDate" name="birthDate">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grp" class="col-sm-2 col-form-label">Choose Group</label>
                    <div class="col-sm-10">
                        <select class="form-select select-sm mt-2 mb-2" aria-label="Default select example" id="grp" name="group_id">
                            <option selected>Choose...</option>
                            @if(isset($groups))
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            @endif
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
<div class="modal fade" id="profModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Prof</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="{{route('admin.store')}}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="nom">First Name</label>
                    <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Enter Full Name">
                </div>
                <div class="form-group mb-2">
                    <label for="prenom">Last Name</label>
                    <input type="text" class="form-control" id="prenom" aria-describedby="prenom" name="prenom" placeholder="Enter Full Name">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password for this Prof" name="password">
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


<script>
        let groupSelect = document.getElementById("groupSelect");
        let tableBody = document.getElementById("myTable").querySelector("tbody");
        let stagiaireRows = tableBody.querySelectorAll("tr");

        groupSelect.addEventListener("change", function() {
        let selectedGroupId = groupSelect.value;
        if (selectedGroupId === "all") {
        tableBody.style.display = "none";
        } else {
        stagiaireRows.forEach(function(row) {
                let groupId = row.getAttribute("data-group-id");
                if (groupId === selectedGroupId) {
                row.style.display = "";
                } else {
                row.style.display = "none";
                }
        });
        tableBody.style.display = "";
        }
        });

        // Hide all rows and submit button by default
        tableBody.style.display = "none";

</script>

<script>
  const editBtns = document.querySelectorAll('.edit-btn');
  const updateForm = document.querySelector('#updateForm form');

  editBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      const ctf = btn.dataset.ctf;
      const nom = btn.dataset.nom;
      const prenom = btn.dataset.prenom;
      const email = btn.dataset.email;
      const telephone = btn.dataset.telephone;
      const birthDate = new Date(btn.dataset.birthdate).toISOString().slice(0, 10);
      const group = btn.dataset.group;
      const status = btn.dataset.status;

      updateForm.ctf.value = ctf;
      updateForm.nom.value = nom;
      updateForm.prenom.value = prenom;
      updateForm.email.value = email;
      updateForm.telephone.value = telephone;
      updateForm.birthDate.value = birthDate;
      updateForm.group_id.value = group;
      updateForm.status_id.value = status;
    });
  });
</script>



<!-- 
<script>
    function editStagiaire(id) {
    // make an AJAX call to fetch the stagiaire details
    fetch(`/stagiaires/${id}`)
        .then(response => response.json())
        .then(stagiaire => {
            // set the values of the form fields using plain JavaScript
            document.querySelector('#ctf_Up').value = stagiaire.ctf;
            document.querySelector('#nom_Up').value = stagiaire.nom;
            document.querySelector('#prenom_Up').value = stagiaire.prenom;
            document.querySelector('#email_Up').value = stagiaire.email;
            document.querySelector('#phoneNumber').value = stagiaire.telephone;
            document.querySelector('#birthDate_Up').value = stagiaire.birth_date;
            document.querySelector('#grp_Up').value = stagiaire.group_id;
            document.querySelector('#status_Up').value = stagiaire.status_id;
        })
        .catch(error => console.log(error));
}


</script> -->

@endsection
