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
          <label for="naziv" class="col-form-label">Filename</label>
          <input required class="form-control" id="filaname">
        </div>
        <div class="form-group">
          <label for="adresa" class="col-form-label">URL</label>
          <input required class="form-control" id="url">
        </div>
        <div class="form-group">
          <label for="radnoVreme" class="col-form-label">Author ID</label>
          <input required class="form-control" id="author_id">
        </div>
        <button type="submit" class="btn btn-primary form-control">Create</button>
      </form>
    </div>
  </div>
</div>