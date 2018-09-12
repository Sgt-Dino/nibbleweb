<link rel="stylesheet" href="style4.css">

<?php>
<main>

    <div>
      <label>Restaurant Name</label>
      <div>
      <input type="text" readonly name="name" class="form-control" value='<?php echo $profile['restaurantname']; ?>'>
      </div>
    </div>
    </br>

    <div>
      <label>Contact</label>
      <div>
      <input type="number" name="contact" class="form-control" value=<?php echo $profile['phone']; ?>>
      </div>
    </div>
    </br>

    <div>
      <label>Email</label>
      <div>
      <input type="text"  name="email" class="form-control" value=<?php echo $profile['email']; ?>>
      </div>
    </div>
    </br>

    <div>
      <label>Restaurant Address</label>
      <div>
      <textarea name="address" class="form-control" cols="1" rows="1" ><?php echo $profile['addressline1']; ?></textarea>
      </div>
    </div>
    </br>

    <div>
      <label>Suburb</label>
      <div>
      <input type="text"  name="suburb" class="form-control" value=<?php echo $profile['suburbid']; ?>>
      </div>
    </div>
    </br>

    <div>
      <label>Website</label>
      <div>
      <input type="text"  name="website" class="form-control" value=<?php echo $profile['websiteurl']; ?>>
      </div>
    </div>
    </br>

</main>
<?php>



<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>