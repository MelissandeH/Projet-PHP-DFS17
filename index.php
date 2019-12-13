<?php session_start(); ?>

<?php include "header.php" ?>

<main role="main">

  <section class="jumbotron text-center" id="ff7-bg">
    <div class="container">
      <h1 class="jumbotron-heading">Welcome to My Gaming List</h1>
      <p class="lead py-2">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '2') { ?>
          <a href="index.php" class="btn btn-primary m-2">My collection</a>
          <a href="account.php" class="btn btn-outline-primary m-2">My account</a>
          <?php } else {?>
            <a href="log.php" class="btn btn-primary m-2">Log In</a>
           <?php } ?>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <h1 class="text-center ">My collection</h1>
      <h4 class="text-muted text-center mb-5">Need to edit something ? Just click on it !</h4>

      <div class="row">
        <div class="col-lg-12 mb-4">
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '2') {
            echo "" ?>
            <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add new card</button></form><?php } ?>
        </div>
        <?php include "cards.php" ?>

        <!-- POP UP WINDOW -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="cards-add.php" method="post" enctype="multipart/form-data">
                  <!--IMAGE-->
                  <input type='file' name="myfile" onchange="readURL(this);" />
                  <img id="imgupload" style="max-width:100%;" />
                  <script>
                    function readURL(input) {
                      if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                          $('#imgupload')
                            .attr('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                      }
                    }
                  </script>

                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                  <script>
                    $('body').on('click', '[data-editable]', function() {

                      var $el = $(this);

                      var $input = $('<input/>').val($el.text());
                      $el.replaceWith($input);

                      var save = function() {
                        var $p = $('<p data-editable />').text($input.val());
                        $input.replaceWith($p);
                      };

                      /**
                        We're defining the callback with `one`, because we know that
                        the element will be gone just after that, and we don't want 
                        any callbacks leftovers take memory. 
                        Next time `p` turns into `input` this single callback 
                        will be applied again.
                      */
                      $input.one('blur', save).focus();

                    });
                  </script>

                  <div class="form-group">
                    <!--TITRE-->
                    <label for="recipient-name" class="col-form-label">Title:</label>
                    <span class="text-muted">255 characters max</span>
                    <input type="text" name="title" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <!--DESCRIPTION-->
                    <label for="message-text" class="col-form-label">Description:</label>
                    <span class="text-muted">300 characters max</span>
                    <textarea class="form-control" name="description" id="message-text"></textarea>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" value="Create new card" class="btn btn-primary"></button>
              </div>
              </form>
            </div>
          </div>
          <script>
            $('#exampleModal').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('whatever') // Extract info from data-* attributes
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              modal.find('.modal-title').text('New message to ' + recipient)
              modal.find('.modal-body input').val(recipient)
            })
          </script>

        </div>
      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
  </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vendor/holder.min.js"></script>
</body>

</html>