function previewImg(){
const img = document.querySelector('#image')
const imgPreview  = document.querySelector('.img-preview ')
imgPreview.style.display = 'block'
const ofReader  = new FileReader();
ofReader .readAsDataURL(img.files[0]);
ofReader.onload = function(eER){
imgPreview.src = eER.target.result;}
}