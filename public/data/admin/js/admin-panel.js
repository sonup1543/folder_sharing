/* Industry Start */

$('#industry_name').keyup(function() {
   var industry_name = this.value;
   if(industry_name!=''){ $("#alt1").text(""); }
});
   
function addIndustry() {
     
    var industry_name = document.forms["industryForm"]["industry_name"].value;
    if (industry_name == null || industry_name == "")
    {
      $("#alt1").text("Industry name must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteIndustryItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this industry!",
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
   
function statusIndustryInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this industry!",
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

function statusIndustryActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this industry!",
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

/* Industry End */

/* Product Of Nyka Start */

$('#products_of_nyka').keyup(function() {
   var products_of_nyka = this.value;
   if(products_of_nyka!=''){ $("#alt1").text(""); }
});
   
function addProductsofnyka() {
     
    var products_of_nyka = document.forms["productsofnykaForm"]["products_of_nyka"].value;
    if (products_of_nyka == null || products_of_nyka == "")
    {
      $("#alt1").text("Products of nyka must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
} 

function deleteProductsofnykaItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this products of nyka!",
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
   
function statusProductsofnykaInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this products of nyka!",
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

function statusProductsofnykaActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this products of nyka!",
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

/* Product Of Nyka End */

/* Name Of The BU Start */

$('#name_of_bu').keyup(function() {
   var name_of_bu = this.value;
   if(name_of_bu!=''){ $("#alt1").text(""); }
});
   
function addNameofthebu() {
     
    var name_of_bu = document.forms["nameofthebuForm"]["name_of_bu"].value;
    if (name_of_bu == null || name_of_bu == "")
    {
      $("#alt1").text("Name of the BU must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteNameofthebuItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this name of the bu!",
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
   
function statusNameofthebuInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this name of the bu!",
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

function statusNameofthebuActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this name of the bu!",
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

/* Name Of The BU End */







/* Client Life Cycle Start */

$('#client_life_cycle').keyup(function() {
   var client_life_cycle = this.value;
   if(client_life_cycle!=''){ $("#alt1").text(""); }
});
   
function addClientlifecycle() {
     
    var client_life_cycle = document.forms["clientlifecycleForm"]["client_life_cycle"].value;
    if (client_life_cycle == null || client_life_cycle == "")
    {
      $("#alt1").text("Client life cycle must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}  

function deleteClientlifecycleItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this client life cycle!",
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
   
function statusClientlifecycleInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this client life cycle!",
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

function statusClientlifecycleActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this client life cycle!",
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

/* Client Life Cycle End */



/* Softcopy Bill Status Start */

$('#softcopy_bill_status').keyup(function() {
   var softcopy_bill_status = this.value;
   if(softcopy_bill_status!=''){ $("#alt1").text(""); }
});
   
function addSoftcopybillstatus() {
    var softcopy_bill_status = document.forms["softcopybillstatusForm"]["softcopy_bill_status"].value;
    if (softcopy_bill_status == null || softcopy_bill_status == "")
    {
      $("#alt1").text("Softcopy bill status must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
}

function deleteSoftcopybillstatusItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this softcopy bill status!",
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

function statusSoftcopybillstatusInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this softcopy bill status!",
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

function statusSoftcopybillstatusActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this softcopy bill status!",
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

/* Softcopy Bill Status End */

/* Hardcopy Bill Status Start */

$('#hardcopy_bill_status').keyup(function() {
   var hardcopy_bill_status = this.value;
   if(hardcopy_bill_status!=''){ $("#alt1").text(""); }
});
   
function addHardcopybillstatus() {
     
    var hardcopy_bill_status = document.forms["hardcopybillstatusForm"]["hardcopy_bill_status"].value;
    if (hardcopy_bill_status == null || hardcopy_bill_status == "")
    {
      $("#alt1").text("Hardcopy bill status must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteHardcopybillstatusItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this hardcopy bill status!",
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
   
function statusHardcopybillstatusInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this hardcopy bill status!",
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

function statusHardcopybillstatusActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this hardcopy bill status!",
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

/* Hardcopy Bill Status End */

/* Tally Entry Status Start */

$('#tally_entry_status').keyup(function() {
   var tally_entry_status = this.value;
   if(tally_entry_status!=''){ $("#alt1").text(""); }
});
   
function addTallyentrystatus() {
     
    var tally_entry_status = document.forms["tallyentrystatusForm"]["tally_entry_status"].value;
    if (tally_entry_status == null || tally_entry_status == "")
    {
      $("#alt1").text("Tally entry status must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteTallyentrystatusItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this tally entry status!",
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
   
function statusTallyentrystatusInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this tally entry status!",
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

function statusTallyentrystatusActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this tally entry status!",
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

/* Tally Entry Status End */

/* Client Source Start */

$('#client_source').keyup(function() {
   var client_source = this.value;
   if(client_source!=''){ $("#alt1").text(""); }
});
   
function addClientsource() {
     
    var client_source = document.forms["clientsourceForm"]["client_source"].value;
    if (client_source == null || client_source == "")
    {
      $("#alt1").text("Client source must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteClientsourceItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this client source!",
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
   
function statusClientsourceInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this client source!",
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

function statusClientsourceActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this client source!",
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

/* Client Source End */

/* Project Tracking Start */

$('#pitch_phase_tracking').keyup(function() {
   var pitch_phase_tracking = this.value;
   if(pitch_phase_tracking!=''){ $("#alt1").text(""); }
});
   
function addPitchphasetracking() {
     
    var pitch_phase_tracking = document.forms["pitchphasetrackingForm"]["pitch_phase_tracking"].value;
    if (pitch_phase_tracking == null || pitch_phase_tracking == "")
    {
      $("#alt1").text("Project tracking must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deletePitchphasetrackingItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this project tracking!",
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
   
function statusPitchphasetrackingInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this project tracking!",
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

function statusPitchphasetrackingActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this project tracking!",
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

/* Project Tracking End */

/* Project Status Start */

$('#project_status').keyup(function() {
   var project_status = this.value;
   if(project_status!=''){ $("#alt1").text(""); }
});
   
function addProjectstatus() {
     
    var project_status = document.forms["projectstatusForm"]["project_status"].value;
    if (project_status == null || project_status == "")
    {
      $("#alt1").text("Project status must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteProjectstatusItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this project status!",
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
   
function statusProjectstatusInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this project status!",
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

function statusProjectstatusActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this project status!",
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

/* Project Status End */

/* Creative Product Sold Start */

$('#creative_product_sold').keyup(function() {
   var creative_product_sold = this.value;
   if(creative_product_sold!=''){ $("#alt1").text(""); }
});
   
function addCreativeproductsold() {
     
    var creative_product_sold = document.forms["creativeproductsoldForm"]["creative_product_sold"].value;
    if (creative_product_sold == null || creative_product_sold == "")
    {
      $("#alt1").text("Creative product sold must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteCreativeproductsoldItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this creative product sold!",
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
   
function statusCreativeproductsoldInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this creative product sold!",
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

function statusCreativeproductsoldActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this creative product sold!",
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

/* Creative Product Sold End */

/* Client Purchase Order Start */

$('#client_purchase_order').keyup(function() {
   var client_purchase_order = this.value;
   if(client_purchase_order!=''){ $("#alt1").text(""); }
});
   
function addClientpurchaseorder() {
     
    var client_purchase_order = document.forms["clientpurchaseorderForm"]["client_purchase_order"].value;
    if (client_purchase_order == null || client_purchase_order == "")
    {
      $("#alt1").text("Client purchase order must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteClientpurchaseorderItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this client purchase order!",
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
   
function statusClientpurchaseorderInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this client purchase order!",
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

function statusClientpurchaseorderActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this client purchase order!",
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

/* Client Purchase Order End */

/* Payment Type By Operations Start */

$('#payment_type_by_operation').keyup(function() {
   var payment_type_by_operation = this.value;
   if(payment_type_by_operation!=''){ $("#alt1").text(""); }
});
   
function addPaymenttypebyoperation() {
     
    var payment_type_by_operation = document.forms["paymenttypebyoperationForm"]["payment_type_by_operation"].value;
    if (payment_type_by_operation == null || payment_type_by_operation == "")
    {
      $("#alt1").text("Payment type by operation must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deletePaymenttypebyoperationItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this payment type by operation!",
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
   
function statusPaymenttypebyoperationInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this payment type by operation!",
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

function statusPaymenttypebyoperationActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this payment type by operation!",
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

/* Payment Type By Operations End */

/* Type Start */

$('#type').keyup(function() {
   var type = this.value;
   if(type!=''){ $("#alt1").text(""); }
});
   
function addType() {
     
    var type = document.forms["typeForm"]["type"].value;
    if (type == null || type == "")
    {
      $("#alt1").text("Type must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteTypeItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this type!",
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
   
function statusTypeInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this type!",
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

function statusTypeActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this type!",
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

/* Type End */

/* Nature Of Expense Start */

$('#nature_of_expense').keyup(function() {
   var nature_of_expense = this.value;
   if(nature_of_expense!=''){ $("#alt1").text(""); }
});
   
function addNatureofexpense() {
     
    var nature_of_expense = document.forms["natureofexpenseForm"]["nature_of_expense"].value;
    if (nature_of_expense == null || nature_of_expense == "")
    {
      $("#alt1").text("Nature of expense must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteNatureofexpenseItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this nature of expense!",
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
   
function statusNatureofexpenseInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this nature of expense!",
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

function statusNatureofexpenseActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this nature of expense!",
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

/* Nature Of Expense End */

/* Project Expense Cost Head Start */

$('#project_expense_cost_head').keyup(function() {
   var project_expense_cost_head = this.value;
   if(project_expense_cost_head!=''){ $("#alt1").text(""); }
});
   
function addProjectexpensecosthead() {
     
    var project_expense_cost_head = document.forms["projectexpensecostheadForm"]["project_expense_cost_head"].value;
    if (project_expense_cost_head == null || project_expense_cost_head == "")
    {
      $("#alt1").text("Project expense cost head must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteProjectexpensecostheadItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this project expense cost head!",
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
   
function statusProjectexpensecostheadInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this project expense cost head!",
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

function statusProjectexpensecostheadActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this project expense cost head!",
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

/* Project Expense Cost Head End */

/* Supportings Start */

$('#supporting').keyup(function() {
   var supporting = this.value;
   if(supporting!=''){ $("#alt1").text(""); }
});
   
function addSupporting() {
     
    var supporting = document.forms["supportingForm"]["supporting"].value;
    if (supporting == null || supporting == "")
    {
      $("#alt1").text("Supporting must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteSupportingItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this supporting!",
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
   
function statusSupportingInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this supporting!",
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

function statusSupportingActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this supporting!",
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

/* Supportings End */

/* Categories Start */

$('#category').keyup(function() {
   var category = this.value;
   if(category!=''){ $("#alt1").text(""); }
});
   
function addCategory() {
     
    var category = document.forms["categoryForm"]["category"].value;
    if (category == null || category == "")
    {
      $("#alt1").text("Category name must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteCategoryItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this category!",
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
   
function statusCategoryInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this category!",
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

function statusCategoryActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this category!",
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

/* Categories End */

/* Turnover Categories End */

$('#turnover_category').keyup(function() {
   var turnover_category = this.value;
   if(turnover_category!=''){ $("#alt1").text(""); }
});
   
function addTurnovercategory() {
     
    var turnover_category = document.forms["turnovercategoryForm"]["turnover_category"].value;
    if (turnover_category == null || turnover_category == "")
    {
      $("#alt1").text("Turnover category must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteTurnovercategoryItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this turnover category!",
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
   
function statusTurnovercategoryInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this turnover category!",
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

function statusTurnovercategoryActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this turnover category!",
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

/* Turnover Categories End */

/* Sheet Name Start */

$('#sheet_name').keyup(function() {
   var sheet_name = this.value;
   if(sheet_name!=''){ $("#alt1").text(""); }
});
   
function addSheetname() {
     
    var sheet_name = document.forms["sheetnameForm"]["sheet_name"].value;
    if (sheet_name == null || sheet_name == "")
    {
      $("#alt1").text("Sheet name must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteSheetnameItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this sheet name!",
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
   
function statusSheetnameInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this sheet name!",
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

function statusSheetnameActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this sheet name!",
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

/* Sheet Name End */

/* Payment Type By Accounts Start */

$('#payment_type_by_account').keyup(function() {
   var payment_type_by_account = this.value;
   if(payment_type_by_account!=''){ $("#alt1").text(""); }
});
   
function addPaymenttypebyaccount() {
     
    var payment_type_by_account = document.forms["paymenttypebyaccountForm"]["payment_type_by_account"].value;
    if (payment_type_by_account == null || payment_type_by_account == "")
    {
      $("#alt1").text("Payment type by account must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deletePaymenttypebyaccountItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this payment type by account!",
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
   
function statusPaymenttypebyaccountInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this payment type by account!",
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

function statusPaymenttypebyaccountActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this payment type by account!",
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

/* Payment Type By Accounts End */

/* Task Start */

$('#task').keyup(function() {
   var task = this.value;
   if(task!=''){ $("#alt1").text(""); }
});
   
function addTask() {
     
    var task = document.forms["taskForm"]["task"].value;
    if (task == null || task == "")
    {
      $("#alt1").text("Task must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteTaskItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this task!",
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
   
function statusTaskInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this task!",
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

function statusTaskActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this task!",
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

/* Task End */

/* Bill To Client Status Update Start */

$('#bill_to_client_status_update').keyup(function() {
   var bill_to_client_status_update = this.value;
   if(bill_to_client_status_update!=''){ $("#alt1").text(""); }
});
   
function addBilltoclientstatusupdate() {
     
    var bill_to_client_status_update = document.forms["billtoclientstatusupdatesForm"]["bill_to_client_status_update"].value;
    if (bill_to_client_status_update == null || bill_to_client_status_update == "")
    {
      $("#alt1").text("Bill to client status update must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteBilltoclientstatusupdateItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this bill to client status update!",
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
   
function statusBilltoclientstatusupdateInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this bill to client status update!",
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

function statusBilltoclientstatusupdateActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this bill to client status update!",
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

/* Bill To Client Status Update End */

/* Client Receipt Status Start */

$('#client_receipt_status').keyup(function() {
   var client_receipt_status = this.value;
   if(client_receipt_status!=''){ $("#alt1").text(""); }
});
   
function addClientreceiptstatus() {
     
    var client_receipt_status = document.forms["clientreceiptstatusForm"]["client_receipt_status"].value;
    if (client_receipt_status == null || client_receipt_status == "")
    {
      $("#alt1").text("Client receipt status must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteClientreceiptstatusItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this client receipt status!",
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
   
function statusClientreceiptstatusInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this client receipt status!",
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

function statusClientreceiptstatusActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this client receipt status!",
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

/* Client Receipt Status End */

/* Budgeted Mode Of Payment Start */

$('#budgeted_mode_of_payment').keyup(function() {
   var budgeted_mode_of_payment = this.value;
   if(budgeted_mode_of_payment!=''){ $("#alt1").text(""); }
});
   
function addBudgetedmodeofpayment() {
     
    var budgeted_mode_of_payment = document.forms["budgetedmodeofpaymentForm"]["budgeted_mode_of_payment"].value;
    if (budgeted_mode_of_payment == null || budgeted_mode_of_payment == "")
    {
      $("#alt1").text("Budgeted mode of payment must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteBudgetedmodeofpaymentItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this budgeted mode of payment!",
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
   
function statusBudgetedmodeofpaymentInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this budgeted mode of payment!",
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

function statusBudgetedmodeofpaymentActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this budgeted mode of payment!",
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

/* Budgeted Mode Of Payment End */

/* Project Expenses The Mode Of Payment Start */

$('#project_expenses_the_mode_of_payment').keyup(function() {
   var project_expenses_the_mode_of_payment = this.value;
   if(project_expenses_the_mode_of_payment!=''){ $("#alt1").text(""); }
});
   
function addProjectexpensesthemodeofpayment() {
     
    var project_expenses_the_mode_of_payment = document.forms["projectexpensesthemodeofpaymentForm"]["project_expenses_the_mode_of_payment"].value;
    if (project_expenses_the_mode_of_payment == null || project_expenses_the_mode_of_payment == "")
    {
      $("#alt1").text("Project expenses the mode of payment must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteProjectexpensesthemodeofpaymentItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this project expenses the mode of payment!",
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
   
function statusProjectexpensesthemodeofpaymentInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this project expenses the mode of payment!",
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

function statusProjectexpensesthemodeofpaymentActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this project expenses the mode of payment!",
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

/* Project Expenses The Mode Of Payment End */

/* Department Start */

$('#department_name').keyup(function() {
       var department_name = this.value;
       if(department_name!=''){ $("#alt1").text(""); }
});
   
function addDepartment() {
     
    var department_name = document.forms["departmentForm"]["department_name"].value;
    if (department_name == null || department_name == "")
    {
      $("#alt1").text("Department name must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
}

function deleteDepartmentItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this department!",
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
   
function statusDepartmentInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this department!",
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

function statusDepartmentActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this department!",
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

/* Department End */

/* Employee Start */

$('#employee_name').keyup(function() {
    var employee_name = this.value;
    if(employee_name!=''){ $("#alt1").text(""); }
});

$('#father_husband_name').keyup(function() {
 var father_husband_name = this.value;
 if(father_husband_name!=''){ $("#alt4").text(""); }
});

$('#mother_name').keyup(function() {
    var mother_name = this.value;
    if(mother_name!=''){ $("#alt6").text(""); }
});

$('#mobile_number').keyup(function() {
    var mobile_number = this.value;
    if(mobile_number !=''){ $("#alt7").text(""); }
});

$('#father_husband_cotact_number').keyup(function() {
 var father_husband_cotact_number = this.value;
 if(father_husband_cotact_number!=''){ $("#alt8").text(""); }
});

$('#mobile_number1').keyup(function() {
    var mobile_number1 = this.value;
    if(mobile_number1 !=''){ $("#alt9").text(""); }
});

$('#address1').keyup(function() {
    var address1 = this.value;
    if(address1 !=''){ $("#alt10").text(""); }
});

$('#address2').keyup(function() {
    var address2 = this.value;
    if(address2 !=''){ $("#alt12").text(""); }
});

$('#address3').keyup(function() {
    var address3 = this.value;
    if(address3 !=''){ $("#alt14").text(""); }
});

$('#pincode').keyup(function() {
    var pincode = this.value;
    if(pincode !=''){ $("#alt16").text(""); }
});

$('#state').keyup(function() {
    var state  = this.value;
    if(state !=''){ $("#alt17").text(""); }
});

$('#name_of_emergency_contact').keyup(function() {
    var name_of_emergency_contact = this.value;
    if(name_of_emergency_contact !=''){ $("#alt18").text(""); }
});

$('#relationship_of_emergency_contact').keyup(function() {
    var relationship_of_emergency_contact = this.value;
    if(relationship_of_emergency_contact !=''){ $("#alt19").text(""); }
});

$('#emg_mobile_number').keyup(function() {
    var emg_mobile_number = this.value;
    if(emg_mobile_number !=''){ $("#alt20").text(""); }
});

$('#emg_mobile_number1').keyup(function() {
    var emg_mobile_number1 = this.value;
    if(emg_mobile_number1 !=''){ $("#alt21").text(""); }
});

$('#password').keyup(function() {
    var password = this.value;
    if(password !=''){ $("#alt24").text(""); }
});

function addEmployee() {
     
    var employee_name = document.forms["employeeForm"]["employee_name"].value;
    if (employee_name == null || employee_name == "")
    {
      $("#alt1").text("Name of the employee must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
    /*var joining_date = document.forms["employeeForm"]["joining_date"].value;
    if (joining_date == null || joining_date == "")
    {
      $("#alt2").text("Date of joining must be filled out!");
      return false;
    }
    else{
      $("#alt2").text("");
    }
    
    var personal_emailid = document.forms["employeeForm"]["personal_emailid"].value;
    if (personal_emailid == null || personal_emailid == "")
    {
      $("#alt3").text("Email id personal must be filled out!");
      return false;
    }
    else{
      $("#alt3").text("");
    }
    
    var father_husband_name = document.forms["employeeForm"]["father_husband_name"].value;
    if (father_husband_name == null || father_husband_name == "")
    {
      $("#alt4").text("Father/Husband's name must be filled out!");
      return false;
    }
    else{
      $("#alt4").text("");
    }*/
    
    var official_emailid = document.forms["employeeForm"]["official_emailid"].value;
    if (official_emailid == null || official_emailid == "")
    {
      $("#alt5").text("Email id official must be filled out!");
      return false;
    }
    else{
      $("#alt5").text("");
    }
    
    /*var mother_name = document.forms["employeeForm"]["mother_name"].value;
    if (mother_name == null || mother_name == "")
    {
      $("#alt6").text("Mother's name must be filled out!");
      return false;
    }
    else{
      $("#alt6").text("");
    }*/
    
    var mobile_number = document.forms["employeeForm"]["mobile_number"].value;
    if (mobile_number == null || mobile_number == "")
    {
      $("#alt7").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt7").text("");
    }
    
    /*var father_husband_cotact_number = document.forms["employeeForm"]["father_husband_cotact_number"].value;
    if (father_husband_cotact_number == null || father_husband_cotact_number == "")
    {
      $("#alt8").text("Father/Husband's contact number must be filled out!");
      return false;
    }
    else{
      $("#alt8").text("");
    }
    
    var mobile_number1 = document.forms["employeeForm"]["mobile_number1"].value;
    if (mobile_number1 == null || mobile_number1 == "")
    {
      $("#alt9").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt9").text("");
    }
    
    var profile_image = document.forms["employeeForm"]["profile_image"].value;
    if (profile_image == null || profile_image == "")
    {
      $("#alt26").text("Profile image must be filled out!");
      return false;
    }
    else{
      
      const fileInput = document.getElementById("profile_image");
      const acceptedTypes = ["image/jpeg", "image/jpg", "image/png"];
      const maxFileSize = 5 * 1024 * 1024; // 5 MB
    
      const file = fileInput.files[0];
      const fileType = file.type;
      const fileSize = file.size;
    
      if (!acceptedTypes.includes(fileType)) {
        $("#alt26").text("Invalid file type. Only JPEG, JPG, and PNG files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt26").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var address1 = document.forms["employeeForm"]["address1"].value;
    if (address1 == null || address1 == "")
    {
      $("#alt10").text("Address 1 must be filled out!");
      return false;
    }
    else{
      $("#alt10").text("");
    }
    
    var adhar_copy = document.forms["employeeForm"]["adhar_copy"].value;
    if (adhar_copy == null || adhar_copy == "")
    {
      $("#alt11").text("Adhar copy must be filled out!");
      return false;
    }
    else{
        
      const fileInput = document.getElementById("adhar_copy");
      const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
      const maxFileSize = 5 * 1024 * 1024; // 5 MB
    
      const file = fileInput.files[0];
      const fileType = file.type;
      const fileSize = file.size;
    
      if (!acceptedTypes.includes(fileType)) {
        $("#alt11").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt11").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var address2 = document.forms["employeeForm"]["address2"].value;
    if (address2 == null || address2 == "")
    {
      $("#alt12").text("Address 2 must be filled out!");
      return false;
    }
    else{
      $("#alt12").text("");
    }
    
    var pan_copy = document.forms["employeeForm"]["pan_copy"].value;
    if (pan_copy == null || pan_copy == "")
    {
      $("#alt13").text("PAN copy must be filled out!");
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
        $("#alt13").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt13").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var address3 = document.forms["employeeForm"]["address3"].value;
    if (address3 == null || address3 == "")
    {
      $("#alt14").text("Address 3 must be filled out!");
      return false;
    }
    else{
      $("#alt14").text("");
    }
    
    var salary_slip = document.forms["employeeForm"]["salary_slip"].value;
    if (salary_slip == null || salary_slip == "")
    {
      $("#alt15").text("Past employment salary slip must be filled out!");
      return false;
    }
    else{
        
      const fileInput = document.getElementById("salary_slip");
      const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
      const maxFileSize = 5 * 1024 * 1024; // 5 MB
    
      const file = fileInput.files[0];
      const fileType = file.type;
      const fileSize = file.size;
    
      if (!acceptedTypes.includes(fileType)) {
        $("#alt15").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt15").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var pincode = document.forms["employeeForm"]["pincode"].value;
    if (pincode == null || pincode == "")
    {
      $("#alt16").text("Pin code must be filled out!");
      return false;
    }
    else{
      $("#alt16").text("");
    }
    
    var state = document.forms["employeeForm"]["state"].value;
    if (state == null || state == "")
    {
      $("#alt17").text("State must be filled out!");
      return false;
    }
    else{
      $("#alt17").text("");
    }
    
    var name_of_emergency_contact = document.forms["employeeForm"]["name_of_emergency_contact"].value;
    if (name_of_emergency_contact == null || name_of_emergency_contact == "")
    {
      $("#alt18").text("Name of emergency contact must be filled out!");
      return false;
    }
    else{
      $("#alt18").text("");
    }
    
    var relationship_of_emergency_contact = document.forms["employeeForm"]["relationship_of_emergency_contact"].value;
    if (relationship_of_emergency_contact == null || relationship_of_emergency_contact == "")
    {
      $("#alt19").text("Relationship of emergency contact must be filled out!");
      return false;
    }
    else{
      $("#alt19").text("");
    }
    
    var emg_mobile_number = document.forms["employeeForm"]["emg_mobile_number"].value;
    if (emg_mobile_number == null || emg_mobile_number == "")
    {
      $("#alt20").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt20").text("");
    }
    
    var emg_mobile_number1 = document.forms["employeeForm"]["emg_mobile_number1"].value;
    if (emg_mobile_number1 == null || emg_mobile_number1 == "")
    {
      $("#alt21").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt21").text("");
    }*/
    
    var department_id = document.forms["employeeForm"]["department_id"].value;
    if (department_id == null || department_id == "")
    {
      $("#alt22").text("Department must be filled out!");
      return false;
    }
    else{
      $("#alt22").text("");
    }
    
    /*var nameofthebu_id = document.forms["employeeForm"]["nameofthebu_id"].value;
    if (nameofthebu_id == null || nameofthebu_id == "")
    {
      $("#alt23").text("BU number must be filled out!");
      return false;
    }
    else{
      $("#alt23").text("");
    }*/
    
    var password = document.forms["employeeForm"]["password"].value;
    if (password == null || password == "")
    {
      $("#alt24").text("password must be filled out!");
      return false;
    }
    else{
      $("#alt24").text("");
    }
    
    var confirm_password = document.forms["employeeForm"]["confirm_password"].value;
    if (confirm_password == null || confirm_password == "")
    {
      $("#alt25").text("Confirm password must be filled out!");
      return false;
    }
    else{
      $("#alt25").text("");
    }
    
}

function editEmployee() {
     
    var employee_name = document.forms["employeeForm"]["employee_name"].value;
    if (employee_name == null || employee_name == "")
    {
      $("#alt1").text("Name of the employee must be filled out!");
      return false;
    }
    else{
      $("#alt1").text("");
    }
    
    /*var joining_date = document.forms["employeeForm"]["joining_date"].value;
    if (joining_date == null || joining_date == "")
    {
      $("#alt2").text("Date of joining must be filled out!");
      return false;
    }
    else{
      $("#alt2").text("");
    }
    
    var personal_emailid = document.forms["employeeForm"]["personal_emailid"].value;
    if (personal_emailid == null || personal_emailid == "")
    {
      $("#alt3").text("Email id personal must be filled out!");
      return false;
    }
    else{
      $("#alt3").text("");
    }
    
    var father_husband_name = document.forms["employeeForm"]["father_husband_name"].value;
    if (father_husband_name == null || father_husband_name == "")
    {
      $("#alt4").text("Father/Husband's name must be filled out!");
      return false;
    }
    else{
      $("#alt4").text("");
    }*/
    
    var official_emailid = document.forms["employeeForm"]["official_emailid"].value;
    if (official_emailid == null || official_emailid == "")
    {
      $("#alt5").text("Email id official must be filled out!");
      return false;
    }
    else{
      $("#alt5").text("");
    }
    
    /*var mother_name = document.forms["employeeForm"]["mother_name"].value;
    if (mother_name == null || mother_name == "")
    {
      $("#alt6").text("Mother's name must be filled out!");
      return false;
    }
    else{
      $("#alt6").text("");
    }*/
    
    var mobile_number = document.forms["employeeForm"]["mobile_number"].value;
    if (mobile_number == null || mobile_number == "")
    {
      $("#alt7").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt7").text("");
    }
    
    /*var father_husband_cotact_number = document.forms["employeeForm"]["father_husband_cotact_number"].value;
    if (father_husband_cotact_number == null || father_husband_cotact_number == "")
    {
      $("#alt8").text("Father/Husband's contact number must be filled out!");
      return false;
    }
    else{
      $("#alt8").text("");
    }
    
    var mobile_number1 = document.forms["employeeForm"]["mobile_number1"].value;
    if (mobile_number1 == null || mobile_number1 == "")
    {
      $("#alt9").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt9").text("");
    }
    
    var profile_image = document.forms["employeeForm"]["profile_image"].value;
    if (profile_image == null || profile_image == "")
    {
      //$("#alt26").text("Profile image must be filled out!");
      //return false;
    }
    else{
      
      const fileInput = document.getElementById("profile_image");
      const acceptedTypes = ["image/jpeg", "image/jpg", "image/png"];
      const maxFileSize = 5 * 1024 * 1024; // 5 MB
    
      const file = fileInput.files[0];
      const fileType = file.type;
      const fileSize = file.size;
    
      if (!acceptedTypes.includes(fileType)) {
        $("#alt26").text("Invalid file type. Only JPEG, JPG, and PNG files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt26").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var address1 = document.forms["employeeForm"]["address1"].value;
    if (address1 == null || address1 == "")
    {
      $("#alt10").text("Address 1 must be filled out!");
      return false;
    }
    else{
      $("#alt10").text("");
    }
    
    var adhar_copy = document.forms["employeeForm"]["adhar_copy"].value;
    if (adhar_copy == null || adhar_copy == "")
    {
      //$("#alt11").text("Adhar copy must be filled out!");
      //return false;
    }
    else{
        
      const fileInput = document.getElementById("adhar_copy");
      const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
      const maxFileSize = 5 * 1024 * 1024; // 5 MB
    
      const file = fileInput.files[0];
      const fileType = file.type;
      const fileSize = file.size;
    
      if (!acceptedTypes.includes(fileType)) {
        $("#alt11").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt11").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var address2 = document.forms["employeeForm"]["address2"].value;
    if (address2 == null || address2 == "")
    {
      $("#alt12").text("Address 2 must be filled out!");
      return false;
    }
    else{
      $("#alt12").text("");
    }
    
    var pan_copy = document.forms["employeeForm"]["pan_copy"].value;
    if (pan_copy == null || pan_copy == "")
    {
      //$("#alt13").text("PAN copy must be filled out!");
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
        $("#alt13").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt13").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var address3 = document.forms["employeeForm"]["address3"].value;
    if (address3 == null || address3 == "")
    {
      $("#alt14").text("Address 3 must be filled out!");
      return false;
    }
    else{
      $("#alt14").text("");
    }
    
    var salary_slip = document.forms["employeeForm"]["salary_slip"].value;
    if (salary_slip == null || salary_slip == "")
    {
      //$("#alt15").text("Past employment salary slip must be filled out!");
      //return false;
    }
    else{
        
      const fileInput = document.getElementById("salary_slip");
      const acceptedTypes = ["image/jpeg", "image/jpg", "image/png", "application/pdf"];
      const maxFileSize = 5 * 1024 * 1024; // 5 MB
    
      const file = fileInput.files[0];
      const fileType = file.type;
      const fileSize = file.size;
    
      if (!acceptedTypes.includes(fileType)) {
        $("#alt15").text("Invalid file type. Only JPEG, JPG, PNG and PDF files are allowed!");
        return false;
      }
    
      if (fileSize > maxFileSize) {
        $("#alt15").text("File size exceeds the allowed limit of 5MB!");          
        return false;
      }
      
    }
    
    var pincode = document.forms["employeeForm"]["pincode"].value;
    if (pincode == null || pincode == "")
    {
      $("#alt16").text("Pin code must be filled out!");
      return false;
    }
    else{
      $("#alt16").text("");
    }
    
    var state = document.forms["employeeForm"]["state"].value;
    if (state == null || state == "")
    {
      $("#alt17").text("State must be filled out!");
      return false;
    }
    else{
      $("#alt17").text("");
    }
    
    var name_of_emergency_contact = document.forms["employeeForm"]["name_of_emergency_contact"].value;
    if (name_of_emergency_contact == null || name_of_emergency_contact == "")
    {
      $("#alt18").text("Name of emergency contact must be filled out!");
      return false;
    }
    else{
      $("#alt18").text("");
    }
    
    var relationship_of_emergency_contact = document.forms["employeeForm"]["relationship_of_emergency_contact"].value;
    if (relationship_of_emergency_contact == null || relationship_of_emergency_contact == "")
    {
      $("#alt19").text("Relationship of emergency contact must be filled out!");
      return false;
    }
    else{
      $("#alt19").text("");
    }
    
    var emg_mobile_number = document.forms["employeeForm"]["emg_mobile_number"].value;
    if (emg_mobile_number == null || emg_mobile_number == "")
    {
      $("#alt20").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt20").text("");
    }
    
    var emg_mobile_number1 = document.forms["employeeForm"]["emg_mobile_number1"].value;
    if (emg_mobile_number1 == null || emg_mobile_number1 == "")
    {
      $("#alt21").text("Mobile number must be filled out!");
      return false;
    }
    else{
      $("#alt21").text("");
    }*/
    
    var department_id = document.forms["employeeForm"]["department_id"].value;
    if (department_id == null || department_id == "")
    {
      $("#alt22").text("Department must be filled out!");
      return false;
    }
    else{
      $("#alt22").text("");
    }
    
    /*var nameofthebu_id = document.forms["employeeForm"]["nameofthebu_id"].value;
    if (nameofthebu_id == null || nameofthebu_id == "")
    {
      $("#alt23").text("BU number must be filled out!");
      return false;
    }
    else{
      $("#alt23").text("");
    }*/
    
    
}

function deleteEmployeeItem(val) {
  var form = 'deleteForm-' + val;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this employee!",
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
   
function statusEmployeeInactive(val) {
  var form = 'inactiveForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to inactive to this employee!",
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

function statusEmployeeActive(val) {
 var form = 'activeForm-' + val;
  swal({
    title: "Are you sure?",
    text: "You want to active to this employee!",
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

/* Employee End */


   /*  softcopy */


// function getProjectID(){
    
//     var projectid = $('#project_id').val();
//     // alert(projectid);
//     // return false;
    
//      $.ajaxSetup({
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//         });
    
//     $.ajax({
        
//         type: 'POST',
//         url: '/softcopy/getProjectOwnerName',
//         data: { projectid: projectid },
//         success: function(data) {
//             //alert(data);
//         }
//     });
// }






