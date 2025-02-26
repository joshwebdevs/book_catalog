<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/dashboardbar.php'; ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Book Catalog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
           <div class="card-header d-flex align-items-center">
  <h3 class="card-title">Books</h3>
  <div class="ml-auto">
    <button class="btn btn-success" data-toggle="modal" data-target="#add">Add</button>
  </div>
</div>
            <div class="card-body table-responsive p-0" style="height: 400px;">
              <form method="POST">
                <table class="table table-bordered text-center">
                  <thead class="thead-light">
                    <tr>
                      <th>Title</th>
                      <th>ISBN</th>
                      <th>Author</th>
                      <th>Publisher</th>
                      <th>Year Published</th>
                      <th>Category</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
  <?php
  try {
      $sql = "SELECT * FROM books"; 
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($books) {
          foreach ($books as $row) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['title']) . "</td>";
              echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
              echo "<td>" . htmlspecialchars($row['author']) . "</td>";
              echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";
              echo "<td>" . htmlspecialchars($row['year_published']) . "</td>";
              echo "<td>" . htmlspecialchars($row['category']) . "</td>";
              echo '<td>
                      <button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#editBookModal" onclick="edit_data(&quot;'.$row['id'].'~!~'.$row['title'].'~!~'.$row['isbn'].'~!~'.$row['author'].'~!~'.$row['publisher'].'~!~'.$row['year_published'].'~!~'.$row['category'].'&quot;)">Edit</button>
                       <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#deleteBookModal" onclick="deleteBook(&quot;'.$row['id'].'~!~'.$row['title'].'~!~'.$row['isbn'].'~!~'.$row['author'].'~!~'.$row['publisher'].'~!~'.$row['year_published'].'~!~'.$row['category'].'&quot;)">Del</button>
                    </td>';
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='7'>No books found.</td></tr>";
      }
  } catch (PDOException $e) {
      echo "<tr><td colspan='7'>Error: " . $e->getMessage() . "</td></tr>";
  }
  ?>
</tbody>

                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/javascript/dashboard_script.php'; ?>
