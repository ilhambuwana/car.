// purchase-form.js

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('purchase-form');
    const submitButton = document.querySelector('.submit-btn');
  
    // Attach event listener to the submit button
    submitButton.addEventListener('click', function(event) {
      event.preventDefault();  // Prevent form submission initially
  
      // Get form data
      const carModel = document.querySelector('#car-model').value;
      const fullName = document.querySelector('#customer-name').value;
      const email = document.querySelector('#customer-email').value;
      const phoneNumber = document.querySelector('#customer-phone').value;
      const deliveryAddress = document.querySelector('#customer-address').value;
      const paymentMethod = document.querySelector('#payment-method').value;
  
      // Simple validation
      if (!carModel || !fullName || !email || !phoneNumber || !deliveryAddress || !paymentMethod) {
        alert("Please fill out all fields before submitting.");
        return;
      }
  
      // Confirmation before submitting
      const confirmation = confirm("Are you sure you want to submit the purchase?");
      if (confirmation) {
        // If confirmed, submit the form
        form.submit();
      }
    });
  });
  