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
            <th>
              AUTHOR
            </th>
            <th>
              <button class='btn btn-info' id="sort-auth">Sort by author</button>
            </th>
          </tr>
        </thead>
        <tbody id='gists_body'>

        </tbody>
      </table>
    </div>
    <div class="col-4">
      <h2>Create new GitHub Gist:</h2>
      <form id='new-gist-form'>
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

  var SORT_TYPE = "ASC";

  $(document).ready(function() {
    console.log("init");
    loadGists();
    $("#new-gist-form").submit(handleCreateGistClick);
    $("#sort-auth").click(() => sortByAuthor());
  })

  function displayGists(gists) {
    $('#gists_body').html("");
    for(let gist of gists) {
        $("#gists_body").append(`
            <tr>
              <td>${gist.gist_id}</td>
              <td>${gist.url}</td>
              <td>${gist.filename}</td>
              <td>${gist.author_id}</td>
              <td>
                <button onClick="deleteGist(${gist.gist_id})" class='btn btn-danger'>Obrisi</button>  
              </td>  
            </tr>
          `)
      }
  }

  function fetchGists() {
    return $.getJSON('gist-api/getAll.php').then(function(result) {
      if (!result.success) {
        console.log("greska")
        alert("Error occured while fetching gists. Try refreshing page");
        return;
      }
      return result.gists;
    })
  }

  function loadGists() {
    $.getJSON('gist-api/getAll.php').then(function(result) {
      if (!result.success) {
        console.log("greska")
        alert("Error occured while fetching gists. Try refreshing page");
        return;
      }
      console.log("Uspesno ucitana lista gistova");
      displayGists(result.gists);
    })
  }

  async function sortByAuthor() {
    var gists = await fetchGists();
    gists = gists.sort((gist1,gist2) => {
      if (SORT_TYPE === 'ASC') return gist1.author_id - gist2.author_id;
      else return gist2.author_id - gist1.author_id;
    })
    SORT_TYPE = SORT_TYPE === "ASC" ? "DESC" : "ASC";
    displayGists(gists);
  }

  function deleteGist(gist_id) {
    const sendObject = { gist_id };
    $.post('gist-api/delete.php', sendObject).then(response => {
      response = JSON.parse(response);
      if (!response.success) {
        alert(`Error occured while deleting gist with id=${gist_id}. Refresh page`);
        return;
      }
      loadGists();
    })
  }

  function handleCreateGistClick(event) {
    event.preventDefault();

    const attrs = ['filename','url','author_id'];
    const gist = {};
    for(let attr of attrs) {
      gist[attr] = $(`#${attr}`).val()
    }
    gist['author_id'] = Number.parseInt(gist['author_id']);
    console.log(gist);
    $.post("gist-api/create.php",{
      ...gist
    }).then(response => {
      console.log(response);
      response = JSON.parse(response);
        if (!response.success) {
          console.log(response.error);
          alert("Error occured while creting new gist");
        }
        loadGists();
    })
  }

</script>