document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
  
    fetch('upload.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      console.log(data); 
      refreshGallery();
      document.getElementById('imagePreview').innerHTML = ''; 
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
  
  document.getElementById('image').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
      };
      reader.readAsDataURL(file);
    }
  });
  
  function refreshGallery() {
    fetch('get_images.php')
    .then(response => response.text())
    .then(data => {
      document.getElementById('gallery').innerHTML = data;
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
  
  refreshGallery();
  