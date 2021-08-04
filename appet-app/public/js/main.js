function previewImage() {
  const image = document.querySelector('input[name=image]').files[0];
  const preview = document.querySelector('img[name=image]');

  const reader = new FileReader();
  reader.onload = function() {
    preview.src = reader.result;
  }

  if(image) {
    reader.readAsDataURL(image);
  } else {
    preview.src = "";
  }
}