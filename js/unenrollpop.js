var exampleModal = document.getElementById('exampleModal')
var recipient = ""
var recipient2 = ""
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  recipient = button.getAttribute('data-bs-whatever')
  recipient2 = button.getAttribute('data-bs-whatever2')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  // Update the modal's content.
})

const unenroll = (e) => {
    $.ajax({
        url: "unenrollCourse.php", // server url
        type: 'POST', //POST or GET 
        async: false,
        data: 
        {
            course_id: recipient,
            student_id: recipient2
        }, // data to send in ajax format or querystring format
        datatype: 'json',

        success: function() {
                alert("Unenrollment successful!");  
        },

        error: function() {
            alert('Failed'); // error occur 
        }

    });
    exampleModal.click()
    window.location.replace("Coursespage.php");
}