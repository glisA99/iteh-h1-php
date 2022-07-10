<?php
include 'header.php';
?>
<div class="container p-3 bg-white rounded">
  <h1>Gists</h1>
  <div class="row">
    <div class="col-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>GIST_ID</th>
            <th>URL</th>
            <th>FILENAME</th>
            <th>AUTHOR</th>
          </tr>
        </thead>
        <tbody id='gists_body'>

        </tbody>
      </table>
    </div>
    <div class="col-4">
      <h2>Create new GitHub Gist:</h2>
      <form id='form'>
        <div class="form-group">
          <label for="filename" class="col-form-label">Filename</label>
          <input required class="form-control" id="filename">
        </div>
        <div class="form-group">
          <label for="url" class="col-form-label">URL</label>
          <input required class="form-control" id="url">
        </div>
        <div class="form-group">
          <label for="author_id" class="col-form-label">Author ID</label>
          <input required class="form-control" id="author_id">
        </div>
        <button type="submit" class="btn btn-primary form-control">Create</button>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    console.log("init");
    loadGists();
  })

  function loadGists() {
    console.log("HERE");
    $.getJSON('gist-api/getAll.php').then(function(result) {
      console.log("HERE2");
      if (!result.success) {
        console.log("greska")
        alert("Greska prilikom ucitavanje liste gistova");
        return;
      }
      console.log("Uspesno")
      alert("Uspesno ucitana lista gistova");
      $('#gists_body').html("");
      for(let gist of result.gists) {
        $("#gists_body").append(`
            <tr>
              <td>${gist.gist_id}</td>
              <td>${gist.url}</td>
              <td>${gist.filename}</td>
              <td>${gist.author_id}</td>
              <td>
                <button onClick="obrisi(${gist.gist_id})" class='btn btn-danger'>Obrisi</button>  
              </td>  
            </tr>
          `)
      }
    })
  }
</script>