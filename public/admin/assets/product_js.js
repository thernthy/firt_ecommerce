$(document).ready(function() {
    $('#toggleInventory').change(function() {
        if (this.checked) {
            $('#inventory_board').removeClass('board_inactive');
        } else {
            $('#inventory_board').addClass('board_inactive');
        }
    });
});
function updateSelectedImage() {
    const input = document.getElementById('catagory_img');
    const selectedImg = document.getElementById('selected_img');
        console.log(input.files); 
      if (input.files && input.files[0]) {
        const reader = new FileReader();
      reader.onload = function (e) {
        selectedImg.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
 document.getElementById('catagory_img').addEventListener('change', updateSelectedImage);