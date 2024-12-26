/* Vendor Start */

$('#company_name').keyup(function() {
   var company_name = this.value;
   if(company_name!=''){ $("#alt1").text(""); }
});

$('#mobile').keyup(function() {
   var mobile = this.value;
   if(mobile!=''){ $("#alt2").text(""); }
});

$('#owner_first_name').keyup(function() {
   var owner_first_name = this.value;
   if(owner_first_name!=''){ $("#alt3").text(""); }
});

$('#mobile1').keyup(function() {
   var mobile1 = this.value;
   if(mobile1!=''){ $("#alt4").text(""); }
});

$('#owner_surname').keyup(function() {
   var owner_surname = this.value;
   if(owner_surname!=''){ $("#alt5").text(""); }
});

$('#address1').keyup(function() {
   var address1 = this.value;
   if(address1!=''){ $("#alt7").text(""); }
});

$('#email1').keyup(function() {
   var email1 = this.value;
   if(email1!=''){ $("#alt8").text(""); }
});

$('#address2').keyup(function() {
   var address2 = this.value;
   if(address2!=''){ $("#alt9").text(""); }
});

$('#address3').keyup(function() {
   var address3 = this.value;
   if(address3!=''){ $("#alt11").text(""); }
});

$('#city').keyup(function() {
   var city = this.value;
   if(city!=''){ $("#alt12").text(""); }
});

$('#pincode').keyup(function() {
   var pincode = this.value;
   if(pincode!=''){ $("#alt13").text(""); }
});

$('#state').keyup(function() {
   var state = this.value;
   if(state!=''){ $("#alt14").text(""); }
});

$('#incharge_first_name').keyup(function() {
   var incharge_first_name = this.value;
   if(incharge_first_name!=''){ $("#alt15").text(""); }
});

$('#incharge_mobile').keyup(function() {
   var incharge_mobile = this.value;
   if(incharge_mobile!=''){ $("#alt16").text(""); }
});

$('#incharge_surname').keyup(function() {
   var incharge_surname = this.value;
   if(incharge_surname!=''){ $("#alt17").text(""); }
});

$('#tax_applicable').keyup(function() {
   var tax_applicable = this.value;
   if(tax_applicable!=''){ $("#alt19").text(""); }
});

$('#bank_name').keyup(function() {
   var bank_name = this.value;
   if(bank_name!=''){ $("#alt20").text(""); }
});

$('#sac_code').keyup(function() {
   var sac_code = this.value;
   if(sac_code!=''){ $("#alt21").text(""); }
});

$('#branch_name').keyup(function() {
   var branch_name = this.value;
   if(branch_name!=''){ $("#alt22").text(""); }
});

$('#gst_no').keyup(function() {
   var gst_no = this.value;
   if(gst_no!=''){ $("#alt23").text(""); }
});

$('#bank_account_no').keyup(function() {
   var bank_account_no = this.value;
   if(bank_account_no!=''){ $("#alt24").text(""); }
});

$('#pan_no').keyup(function() {
   var pan_no = this.value;
   if(pan_no!=''){ $("#alt25").text(""); }
});

$('#ifsc_code').keyup(function() {
   var ifsc_code = this.value;
   if(ifsc_code!=''){ $("#alt26").text(""); }
});

$('#swift_code').keyup(function() {
   var swift_code = this.value;
   if(swift_code!=''){ $("#alt27").text(""); }
});


function addVendor() 
{
    var company_name = document.forms["vendorForm"]["company_name"].value;
    if (company_name == null || company_name == "")
    {
       $("#alt1").text("Name of the company must be filled out!");
       return false;
    }
    else{
       $("#alt1").text("");
    }
    
    var mobile = document.forms["vendorForm"]["mobile"].value;
    if (mobile == null || mobile == "")
    {
       $("#alt2").text("Mobile number must be filled out!");
       return false;
    }
    else{
       $("#alt2").text("");
    }
    
    var owner_first_name = document.forms["vendorForm"]["owner_first_name"].value;
    if (owner_first_name == null || owner_first_name == "")
    {
       $("#alt3").text("Owner first name must be filled out!");
       return false;
    }
    else{
       $("#alt3").text("");
    }
    
    var mobile1 = document.forms["vendorForm"]["mobile1"].value;
    if (mobile1 == null || mobile1 == "")
    {
       $("#alt4").text("Mobile number 1 must be filled out!");
       return false;
    }
    else{
       $("#alt4").text("");
    }
    
    var owner_surname = document.forms["vendorForm"]["owner_surname"].value;
    if (owner_surname == null || owner_surname == "")
    {
       $("#alt5").text("Owner surname must be filled out!");
       return false;
    }
    else{
       $("#alt5").text("");
    }
    
    var email = document.forms["vendorForm"]["email"].value;
    if (email == null || email == "")
    {
       $("#alt6").text("Email must be filled out!");
       return false;
    }
    else{
       $("#alt6").text("");
    }
    
    var address1 = document.forms["vendorForm"]["address1"].value;
    if (address1 == null || address1 == "")
    {
       $("#alt7").text("Address 1 must be filled out!");
       return false;
    }
    else{
       $("#alt7").text("");
    }
    
    var email1 = document.forms["vendorForm"]["email1"].value;
    if (email1 == null || email1 == "")
    {
       $("#alt8").text("Email 1 must be filled out!");
       return false;
    }
    else{
       $("#alt8").text("");
    }
    
    var address2 = document.forms["vendorForm"]["address2"].value;
    if (address2 == null || address2 == "")
    {
       $("#alt9").text("Address 2 must be filled out!");
       return false;
    }
    else{
       $("#alt9").text("");
    }
    
    var category_id = document.forms["vendorForm"]["category_id"].value;
    if (category_id == null || category_id == "")
    {
       $("#alt10").text("Category must be filled out!");
       return false;
    }
    else{
       $("#alt10").text("");
    }
    
    var address3 = document.forms["vendorForm"]["address3"].value;
    if (address3 == null || address3 == "")
    {
       $("#alt11").text("Address 3 must be filled out!");
       return false;
    }
    else{
       $("#alt11").text("");
    }
    
    var city = document.forms["vendorForm"]["city"].value;
    if (city == null || city == "")
    {
       $("#alt12").text("City must be filled out!");
       return false;
    }
    else{
       $("#alt12").text("");
    }
    
    var pincode = document.forms["vendorForm"]["pincode"].value;
    if (pincode == null || pincode == "")
    {
       $("#alt13").text("Pincode must be filled out!");
       return false;
    }
    else{
       $("#alt13").text("");
    }
    
    var state = document.forms["vendorForm"]["state"].value;
    if (state == null || state == "")
    {
       $("#alt14").text("State must be filled out!");
       return false;
    }
    else{
       $("#alt14").text("");
    }
    
    var incharge_first_name = document.forms["vendorForm"]["incharge_first_name"].value;
    if (incharge_first_name == null || incharge_first_name == "")
    {
       $("#alt15").text("Accounts incharge first name must be filled out!");
       return false;
    }
    else{
       $("#alt15").text("");
    }
    
    var incharge_mobile = document.forms["vendorForm"]["incharge_mobile"].value;
    if (incharge_mobile == null || incharge_mobile == "")
    {
       $("#alt16").text("Mobile number must be filled out!");
       return false;
    }
    else{
       $("#alt16").text("");
    }
    
    var incharge_surname = document.forms["vendorForm"]["incharge_surname"].value;
    if (incharge_surname == null || incharge_surname == "")
    {
       $("#alt17").text("Accounts incharge surname must be filled out!");
       return false;
    }
    else{
       $("#alt17").text("");
    }
    
    var incharge_email = document.forms["vendorForm"]["incharge_email"].value;
    if (incharge_email == null || incharge_email == "")
    {
       $("#alt18").text("Email id must be filled out!");
       return false;
    }
    else{
       $("#alt18").text("");
    }
    
    var tax_applicable = document.forms["vendorForm"]["tax_applicable"].value;
    if (tax_applicable == null || tax_applicable == "")
    {
       $("#alt19").text("Tax applicable (gst) must be filled out!");
       return false;
    }
    else{
       $("#alt19").text("");
    }
    
    var bank_name = document.forms["vendorForm"]["bank_name"].value;
    if (bank_name == null || bank_name == "")
    {
       $("#alt20").text("Bank name must be filled out!");
       return false;
    }
    else{
       $("#alt20").text("");
    }
    
    var sac_code = document.forms["vendorForm"]["sac_code"].value;
    if (sac_code == null || sac_code == "")
    {
       $("#alt21").text("SAC code must be filled out!");
       return false;
    }
    else{
       $("#alt21").text("");
    }
    
    var branch_name = document.forms["vendorForm"]["branch_name"].value;
    if (branch_name == null || branch_name == "")
    {
       $("#alt22").text("Branch name must be filled out!");
       return false;
    }
    else{
       $("#alt22").text("");
    }
    
    var gst_no = document.forms["vendorForm"]["gst_no"].value;
    if (gst_no == null || gst_no == "")
    {
       $("#alt23").text("GST no must be filled out!");
       return false;
    }
    else{
       $("#alt23").text("");
    }
    
    var bank_account_no = document.forms["vendorForm"]["bank_account_no"].value;
    if (bank_account_no == null || bank_account_no == "")
    {
       $("#alt24").text("Bank account no must be filled out!");
       return false;
    }
    else{
       $("#alt24").text("");
    }
    
    var pan_no = document.forms["vendorForm"]["pan_no"].value;
    if (pan_no == null || pan_no == "")
    {
       $("#alt25").text("PAN no must be filled out!");
       return false;
    }
    else{
       $("#alt25").text("");
    }
    
    var ifsc_code = document.forms["vendorForm"]["ifsc_code"].value;
    if (ifsc_code == null || ifsc_code == "")
    {
       $("#alt26").text("IFSC code must be filled out!");
       return false;
    }
    else{
       $("#alt26").text("");
    }
    
    var swift_code = document.forms["vendorForm"]["swift_code"].value;
    if (swift_code == null || swift_code == "")
    {
       $("#alt27").text("Swift code must be filled out!");
       return false;
    }
    else{
       $("#alt27").text("");
    }
    
    /* var gst_certificate = document.forms["vendorForm"]["gst_certificate"].value;
    if (gst_certificate == null || gst_certificate == "")
    {
       $("#alt28").text("GST certificate must be filled out!");
       return false;
    }
    else{
          const fileInput = document.getElementById("gst_certificate");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt28").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt28").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    }
    
    var pan_copy = document.forms["vendorForm"]["pan_copy"].value;
    if (pan_copy == null || pan_copy == "")
    {
       $("#alt29").text("PAN copy must be filled out!");
       return false;
    }
    else{
          const fileInput = document.getElementById("pan_copy");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt29").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt29").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    }
    
    var cancel_cheque = document.forms["vendorForm"]["cancel_cheque"].value;
    if (cancel_cheque == null || cancel_cheque == "")
    {
       $("#alt30").text("Cancel cheque must be filled out!");
       return false;
    }
    else{
          const fileInput = document.getElementById("cancel_cheque");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt30").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt30").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    }

    var master_service_agreement = document.forms["vendorForm"]["master_service_agreement"].value;
    if (master_service_agreement == null || master_service_agreement == "")
    {
       $("#alt31").text("Master service agreement must be filled out!");
       return false;
    }
    else{
          const fileInput = document.getElementById("master_service_agreement");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt31").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt31").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    } */
    
}

function editVendor() 
{
    var company_name = document.forms["vendorForm"]["company_name"].value;
    if (company_name == null || company_name == "")
    {
       $("#alt1").text("Name of the company must be filled out!");
       return false;
    }
    else{
       $("#alt1").text("");
    }
    
    var mobile = document.forms["vendorForm"]["mobile"].value;
    if (mobile == null || mobile == "")
    {
       $("#alt2").text("Mobile number must be filled out!");
       return false;
    }
    else{
       $("#alt2").text("");
    }
    
    var owner_first_name = document.forms["vendorForm"]["owner_first_name"].value;
    if (owner_first_name == null || owner_first_name == "")
    {
       $("#alt3").text("Owner first name must be filled out!");
       return false;
    }
    else{
       $("#alt3").text("");
    }
    
    var mobile1 = document.forms["vendorForm"]["mobile1"].value;
    if (mobile1 == null || mobile1 == "")
    {
       $("#alt4").text("Mobile number 1 must be filled out!");
       return false;
    }
    else{
       $("#alt4").text("");
    }
    
    var owner_surname = document.forms["vendorForm"]["owner_surname"].value;
    if (owner_surname == null || owner_surname == "")
    {
       $("#alt5").text("Owner surname must be filled out!");
       return false;
    }
    else{
       $("#alt5").text("");
    }
    
    var email = document.forms["vendorForm"]["email"].value;
    if (email == null || email == "")
    {
       $("#alt6").text("Email must be filled out!");
       return false;
    }
    else{
       $("#alt6").text("");
    }
    
    var address1 = document.forms["vendorForm"]["address1"].value;
    if (address1 == null || address1 == "")
    {
       $("#alt7").text("Address 1 must be filled out!");
       return false;
    }
    else{
       $("#alt7").text("");
    }
    
    var email1 = document.forms["vendorForm"]["email1"].value;
    if (email1 == null || email1 == "")
    {
       $("#alt8").text("Email 1 must be filled out!");
       return false;
    }
    else{
       $("#alt8").text("");
    }
    
    var address2 = document.forms["vendorForm"]["address2"].value;
    if (address2 == null || address2 == "")
    {
       $("#alt9").text("Address 2 must be filled out!");
       return false;
    }
    else{
       $("#alt9").text("");
    }
    
    var category_id = document.forms["vendorForm"]["category_id"].value;
    if (category_id == null || category_id == "")
    {
       $("#alt10").text("Category must be filled out!");
       return false;
    }
    else{
       $("#alt10").text("");
    }
    
    var address3 = document.forms["vendorForm"]["address3"].value;
    if (address3 == null || address3 == "")
    {
       $("#alt11").text("Address 3 must be filled out!");
       return false;
    }
    else{
       $("#alt11").text("");
    }
    
    var city = document.forms["vendorForm"]["city"].value;
    if (city == null || city == "")
    {
       $("#alt12").text("City must be filled out!");
       return false;
    }
    else{
       $("#alt12").text("");
    }
    
    var pincode = document.forms["vendorForm"]["pincode"].value;
    if (pincode == null || pincode == "")
    {
       $("#alt13").text("Pincode must be filled out!");
       return false;
    }
    else{
       $("#alt13").text("");
    }
    
    var state = document.forms["vendorForm"]["state"].value;
    if (state == null || state == "")
    {
       $("#alt14").text("State must be filled out!");
       return false;
    }
    else{
       $("#alt14").text("");
    }
    
    var incharge_first_name = document.forms["vendorForm"]["incharge_first_name"].value;
    if (incharge_first_name == null || incharge_first_name == "")
    {
       $("#alt15").text("Accounts incharge first name must be filled out!");
       return false;
    }
    else{
       $("#alt15").text("");
    }
    
    var incharge_mobile = document.forms["vendorForm"]["incharge_mobile"].value;
    if (incharge_mobile == null || incharge_mobile == "")
    {
       $("#alt16").text("Mobile number must be filled out!");
       return false;
    }
    else{
       $("#alt16").text("");
    }
    
    var incharge_surname = document.forms["vendorForm"]["incharge_surname"].value;
    if (incharge_surname == null || incharge_surname == "")
    {
       $("#alt17").text("Accounts incharge surname must be filled out!");
       return false;
    }
    else{
       $("#alt17").text("");
    }
    
    var incharge_email = document.forms["vendorForm"]["incharge_email"].value;
    if (incharge_email == null || incharge_email == "")
    {
       $("#alt18").text("Email id must be filled out!");
       return false;
    }
    else{
       $("#alt18").text("");
    }
    
    var tax_applicable = document.forms["vendorForm"]["tax_applicable"].value;
    if (tax_applicable == null || tax_applicable == "")
    {
       $("#alt19").text("Tax applicable (gst) must be filled out!");
       return false;
    }
    else{
       $("#alt19").text("");
    }
    
    var bank_name = document.forms["vendorForm"]["bank_name"].value;
    if (bank_name == null || bank_name == "")
    {
       $("#alt20").text("Bank name must be filled out!");
       return false;
    }
    else{
       $("#alt20").text("");
    }
    
    var sac_code = document.forms["vendorForm"]["sac_code"].value;
    if (sac_code == null || sac_code == "")
    {
       $("#alt21").text("SAC code must be filled out!");
       return false;
    }
    else{
       $("#alt21").text("");
    }
    
    var branch_name = document.forms["vendorForm"]["branch_name"].value;
    if (branch_name == null || branch_name == "")
    {
       $("#alt22").text("Branch name must be filled out!");
       return false;
    }
    else{
       $("#alt22").text("");
    }
    
    var gst_no = document.forms["vendorForm"]["gst_no"].value;
    if (gst_no == null || gst_no == "")
    {
       $("#alt23").text("GST no must be filled out!");
       return false;
    }
    else{
       $("#alt23").text("");
    }
    
    var bank_account_no = document.forms["vendorForm"]["bank_account_no"].value;
    if (bank_account_no == null || bank_account_no == "")
    {
       $("#alt24").text("Bank account no must be filled out!");
       return false;
    }
    else{
       $("#alt24").text("");
    }
    
    var pan_no = document.forms["vendorForm"]["pan_no"].value;
    if (pan_no == null || pan_no == "")
    {
       $("#alt25").text("PAN no must be filled out!");
       return false;
    }
    else{
       $("#alt25").text("");
    }
    
    var ifsc_code = document.forms["vendorForm"]["ifsc_code"].value;
    if (ifsc_code == null || ifsc_code == "")
    {
       $("#alt26").text("IFSC code must be filled out!");
       return false;
    }
    else{
       $("#alt26").text("");
    }
    
    var swift_code = document.forms["vendorForm"]["swift_code"].value;
    if (swift_code == null || swift_code == "")
    {
       $("#alt27").text("Swift code must be filled out!");
       return false;
    }
    else{
       $("#alt27").text("");
    }
    
    var gst_certificate = document.forms["vendorForm"]["gst_certificate"].value;
    if (gst_certificate == null || gst_certificate == "")
    {
       //$("#alt28").text("GST certificate must be filled out!");
       //return false;
    }
    else{
          const fileInput = document.getElementById("gst_certificate");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt28").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt28").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    }
    
    var pan_copy = document.forms["vendorForm"]["pan_copy"].value;
    if (pan_copy == null || pan_copy == "")
    {
       //$("#alt29").text("PAN copy must be filled out!");
       //return false;
    }
    else{
          const fileInput = document.getElementById("pan_copy");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt29").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt29").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    }
    
    var cancel_cheque = document.forms["vendorForm"]["cancel_cheque"].value;
    if (cancel_cheque == null || cancel_cheque == "")
    {
       //$("#alt30").text("Cancel cheque must be filled out!");
       //return false;
    }
    else{
          const fileInput = document.getElementById("cancel_cheque");
          const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
          const maxFileSize = 5 * 1024 * 1024; // 5 MB
        
          const file = fileInput.files[0];
          const fileType = file.type;
          const fileSize = file.size;
        
          if (!acceptedTypes.includes(fileType)) {
            $("#alt30").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
            return false;
          }
        
          if (fileSize > maxFileSize) {
            $("#alt30").text("File size exceeds the allowed limit of 5MB!");          
            return false;
          }
    }
    
}

function deleteVendorItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this vendor!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#207c24',
    cancelButtonColor: '#ed2d1f',
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    buttons: {
      confirm: {
        text: "OK",
        value: true,
        visible: true,
        className: "",
        closeModal: true
      },
      cancel: {
        text: "Cancel",
        value: false,
        visible: true,
        className: "",
        closeModal: true,
      }
    }
  }).then((result) => {
    if (result) {
      $('#' + form).submit();
    }
  });
}
   
function statusVendorInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this vendor!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#207c24',
    cancelButtonColor: '#ed2d1f',
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    buttons: {
      confirm: {
        text: "OK",
        value: true,
        visible: true,
        className: "",
        closeModal: true
      },
      cancel: {
        text: "Cancel",
        value: false,
        visible: true,
        className: "",
        closeModal: true,
      }
    }
  }).then((result) => {
    if (result) {
      $('#' + form).submit();
    }
  });
}

function statusVendorActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this vendor!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#207c24',
    cancelButtonColor: '#ed2d1f',
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    buttons: {
      confirm: {
        text: "OK",
        value: true,
        visible: true,
        className: "",
        closeModal: true
      },
      cancel: {
        text: "Cancel",
        value: false,
        visible: true,
        className: "",
        closeModal: true,
      }
    }
  }).then((result) => {
    if (result) {
      $('#' + form).submit();
    }
  });
}

/* Vendor End */


