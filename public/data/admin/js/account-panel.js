/* Account Start */

$('#bank_name').keyup(function() {
   var bank_name = this.value;
   if(bank_name!=''){ $("#alt1").text(""); }
});

$('#account_number').keyup(function() {
   var account_number = this.value;
   if(account_number!=''){ $("#alt2").text(""); }
});

$('#branch_name').keyup(function() {
   var branch_name = this.value;
   if(branch_name!=''){ $("#alt3").text(""); }
});

$('#bank_address').keyup(function() {
   var bank_address = this.value;
   if(bank_address!=''){ $("#alt4").text(""); }
});

$('#ifsc_code').keyup(function() {
   var ifsc_code = this.value;
   if(ifsc_code!=''){ $("#alt5").text(""); }
});

$('#account_type').keyup(function() {
   var account_type = this.value;
   if(account_type!=''){ $("#alt6").text(""); }
});

function addBank() 
{
    var bank_name = document.forms["bankForm"]["bank_name"].value;
    if (bank_name == null || bank_name == "")
    {
       $("#alt1").text("Name of the bank must be filled out!");
       return false;
    }
    else{
       $("#alt1").text("");
    }
    
    var account_number = document.forms["bankForm"]["account_number"].value;
    if (account_number == null || account_number == "")
    {
       $("#alt2").text("Account number must be filled out!");
       return false;
    }
    else{
       $("#alt2").text("");
    }
    
    var branch_name = document.forms["bankForm"]["branch_name"].value;
    if (branch_name == null || branch_name == "")
    {
       $("#alt3").text("Branch name must be filled out!");
       return false;
    }
    else{
       $("#alt3").text("");
    }
    
    var bank_address = document.forms["bankForm"]["bank_address"].value;
    if (bank_address == null || bank_address == "")
    {
       $("#alt4").text("Bank address must be filled out!");
       return false;
    }
    else{
       $("#alt4").text("");
    }
    
    var ifsc_code = document.forms["bankForm"]["ifsc_code"].value;
    if (ifsc_code == null || ifsc_code == "")
    {
       $("#alt5").text("IFSC code must be filled out!");
       return false;
    }
    else{
       $("#alt5").text("");
    }
    
    var account_type = document.forms["bankForm"]["account_type"].value;
    if (account_type == null || account_type == "")
    {
       $("#alt6").text("Type of account must be filled out!");
       return false;
    }
    else{
       $("#alt6").text("");
    }
    
}


function deleteBankItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this nyka bank account data!",
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
   
function statusBankInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this nyka bank account data!",
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

function statusBankActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this nyka bank account data!",
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

/* Account End */