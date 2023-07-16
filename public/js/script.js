/* Dengan Rupiah */
var dengan_rupiah = document.getElementById('dengan-rupiah');
dengan_rupiah.addEventListener('keyup', function(e)
{
    dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
});

/* Fungsi */
function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

// const input_field = document.querySelector('.input-slug');
// const slug = document.querySelector("#slug");

//Membuat slug pada form (Tanpa cek database)
// input_field.addEventListener("keyup", function() {
//   let preslug = input_field.value;
//   preslug = preslug.replace(/ /g,"-");
//   slug.value = preslug.toLowerCase();
// });


// slug dengan library + cek database (Tapi masih ada problem ketika digunakan untuk 2 fitur)
// input_field.addEventListener('change', function(){
//   fetch('/dashboard/posts/checkSlug?key=' + input_field.value)
//   .then(response => response.json())
//   .then(data => slug.value = data.slug)
// });



// category_name.addEventListener('change', function(){
//     fetch('/dashboard/categories/checkSlug?category_name=' + category_name.value)
//         .then(response => response.json())
//         .then(data => slug2.value = data.slug)
// });


// document.addEventListener('trix-file-accept', function(e){
//     e.preventDefault();
// });

// Menangani file upload image post
// function readUrl(input) {

//     if (input.files && input.files[0]) {
//       let reader = new FileReader();
//       reader.onload = (e) => {
//         let imgData = e.target.result;
//         let imgName = input.files[0].name;
//         input.setAttribute("data-title", imgName);
//         console.log(e.target.result);
//       }
//       reader.readAsDataURL(input.files[0]);
//     };
// }
// function imagePreview(){
    //// Menangani preview image
    // const image = document.querySelector('#input_image');
    // const imgPreview = document.querySelector('.img-preview');

    // imgPreview.style.display = 'block';

    // const oFReader = new FileReader();
    // oFReader.readAsDataURL(image.files[0]);

    // oFReader.onload = function(oFREvent){
    //   imgPreview.src = oFREvent.target.result;
    // }
// }
//// Preview image pada edit post (Alternatif lain selain preview diatas)
// function previewImage() {
//   frameImageEdit.src=URL.createObjectURL(event.target.files[0]);
// }