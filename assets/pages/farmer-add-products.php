  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add Products</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">
    
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"><img src="../img/plus.png" alt="" class="rounded" width="20" height="20">   Add Products </button>
                    </li>
    
    
                  </ul>
                  <div class="tab-content pt-2">    
                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    
                      <!-- Profile Edit Form -->
                      <form>
                        <div class="row mb-3">
                          <label for="productImage" class="col-md-4 col-lg-3 col-form-label">Product Image</label>
                          <div class="col-md-8 col-lg-9">
                            <img src="../img/fruits.png" alt="Profile">
                            <div class="pt-2">
                              <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                              <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                            </div>
                          </div>
                        </div>
    
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Product Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="productName" type="text" class="form-control" id="fullName" value="" placeholder="Enter the name of Product">
                          </div>
                        </div>
    

    
                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Price</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="price" type="number" class="form-control" id="price" value="" placeholder="Enter the price">
                          </div>
                        </div>
    

    
                        <div class="text-center">
                          <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                      </form><!-- End Profile Edit Form -->
    
                    </div>
    
                    </div>
    
                  </div><!-- End Bordered Tabs -->
    
                </div>
              </div>


        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
