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

@section('stagiaireItem')
style="display:none;"
@endsection

@section('profileUser')
Teacher
@endsection

@section('content')
<h1 class="display-6 text-primary"><strong>Absence Dashboard</strong></h1>
<select id="groupSelect" class="form-select form-select-md mb-4" aria-label=".form-select-lg example">
  <option selected value="all" id="defaultOption">Select Group</option>
  @if(isset($groups))
    @foreach($groups as $group)
      <option value="{{$group->id}}">{{$group->name}}</option>
    @endforeach
  @endif
</select>

<form action="{{ route('teacher.update-absence') }}" method="POST">
  @csrf
  <table class="table" id="myTable">
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
    @foreach($stagiaires as $stagiaire)
    <tr data-group-id="{{$stagiaire->group_id}}">
        <th scope="row" class="text-center"></th>
        <td class="text-center">{{ $stagiaire->nom . ' ' . $stagiaire->prenom }}</td>
        <td class="text-center">
            <input type="checkbox" name="absence[{{$stagiaire->id}}][]" value="1">
        </td>
        <td class="text-center">
            <input type="checkbox" name="absence[{{$stagiaire->id}}][]" value="2">
        </td>
        <td class="text-center">
            <input type="checkbox" name="absence[{{$stagiaire->id}}][]" value="3">
        </td>
        <td class="text-center">
            <input type="checkbox" name="absence[{{$stagiaire->id}}][]" value="4">
        </td>
        <td class="text-center">
            <span class="badge rounded-pill text-bg-warning p-2">{{ optional($stagiaire->status)->status_nom }}</span>
        </td>
    </tr>
    @endforeach

    </tbody>
    
  </table>

  <div class="fixed-bottom d-flex justify-content-end mb-5 me-5">
      <button type="submit" class="btn btn-warning btn-lg" id="submitBtn">Submit</button>
  </div>

</form>


<script>
        let groupSelect = document.getElementById("groupSelect");
        let tableBody = document.getElementById("myTable").querySelector("tbody");
        let stagiaireRows = tableBody.querySelectorAll("tr");
        let submitBtn = document.getElementById("submitBtn");

        groupSelect.addEventListener("change", function() {
        let selectedGroupId = groupSelect.value;
        if (selectedGroupId === "all") {
        tableBody.style.display = "none";
        submitBtn.classList.add("d-none");
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
        submitBtn.classList.remove("d-none");
        }
        });

        // Hide all rows and submit button by default
        tableBody.style.display = "none";
        submitBtn.classList.add("d-none");

</script>


@endsection
