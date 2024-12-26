/* Client Start */

/*$('#website').keyup(function() {
    var website = this.value;
    if(website !=''){ $("#alt2").text(""); }
});*/

$('#comp_name').keyup(function() {
    var comp_name = this.value;
    if(comp_name !=''){ $("#alt3").text(""); }
});

$('#designation').keyup(function() {
    var designation = this.value;
    if(designation !=''){ $("#alt5").text(""); }
});

$('#f_name').keyup(function() {
    var f_name = this.value;
    if(f_name !=''){ $("#alt7").text(""); }
});

/*$('#m_name').keyup(function() {
    var m_name = this.value;
    if(m_name !=''){ $("#alt8").text(""); }
});*/

$('#l_name').keyup(function() {
    var l_name = this.value;
    if(l_name !=''){ $("#alt9").text(""); }
});

$('#mbl').keyup(function() {
    var mbl = this.value;
    if(mbl !=''){ $("#alt12").text(""); }
});

$('#mbl1').keyup(function() {
    var mbl1 = this.value;
    if(mbl1 !=''){ $("#alt13").text(""); }
});

$('#direct').keyup(function() {
    var direct = this.value;
    if(direct !=''){ $("#alt14").text(""); }
});

$('#std').keyup(function() {
    var std = this.value;
    if(std !=''){ $("#alt15").text(""); }
});

$('#buildno').keyup(function() {
    var buildno = this.value;
    if(buildno !=''){ $("#alt16").text(""); }
});

$('#buildname').keyup(function() {
    var buildname = this.value;
    if(buildname !=''){ $("#alt17").text(""); }
});

$('#streetno').keyup(function() {
    var streetno = this.value;
    if(streetno !=''){ $("#alt18").text(""); }
});

$('#streetname').keyup(function() {
    var streetname = this.value;
    if(streetname !=''){ $("#alt19").text(""); }
});

$('#city').keyup(function() {
    var city = this.value;
    if(city !=''){ $("#alt20").text(""); }
});

$('#pincode').keyup(function() {
    var pincode = this.value;
    if(pincode !=''){ $("#alt21").text(""); }
});

$('#state').keyup(function() {
    var state = this.value;
    if(state !=''){ $("#alt22").text(""); }
});

$('#country').keyup(function() {
    var country = this.value;
    if(country !=''){ $("#alt23").text(""); }
});

function addClient() 
{
    var cs_owner = document.forms["clientForm"]["cs_owner"].value;
    if (cs_owner == null || cs_owner == "")
    {
        $("#alt1").text("CS Owner must be filled out!");
        return false;
    }
    else{
        $("#alt1").text("");
    }
    
    /*var website = document.forms["clientForm"]["website"].value;
    if (website == null || website == "")
    {
        $("#alt2").text("Website must be filled out!");
        return false;
    }
    else{
        $("#alt2").text("");
    }*/
    
    var comp_name = document.forms["clientForm"]["comp_name"].value;
    if (comp_name == null || comp_name == "")
    {
        $("#alt3").text("Company Name must be filled out!");
        return false;
    }
    else{
        $("#alt3").text("");
    }
    
    var industry = document.forms["clientForm"]["industry"].value;
    if (industry == null || industry == "")
    {
        $("#alt4").text("Industry must be filled out!");
        return false;
    }
    else{
        $("#alt4").text("");
    }
    
    var designation = document.forms["clientForm"]["designation"].value;
    if (designation == null || designation == "")
    {
        $("#alt5").text("Designation must be filled out!");
        return false;
    }
    else{
        $("#alt5").text("");
    }
    
    var salution = document.forms["clientForm"]["salution"].value;
    if (salution == null || salution == "")
    {
        $("#alt6").text("Salution must be filled out!");
        return false;
    }
    else{
        $("#alt6").text("");
    }
    
    var f_name = document.forms["clientForm"]["f_name"].value;
    if (f_name == null || f_name == "")
    {
        $("#alt7").text("First Name must be filled out!");
        return false;
    }
    else{
        $("#alt7").text("");
    }
    
    /*var m_name = document.forms["clientForm"]["m_name"].value;
    if (m_name == null || m_name == "")
    {
        $("#alt8").text("Middle Name must be filled out!");
        return false;
    }
    else{
        $("#alt8").text("");
    }*/
    
    var l_name = document.forms["clientForm"]["l_name"].value;
    if (l_name == null || l_name == "")
    {
        $("#alt9").text("Last Name must be filled out!");
        return false;
    }
    else{
        $("#alt9").text("");
    }
    
    var email = document.forms["clientForm"]["email"].value;
    if (email == null || email == "")
    {
        $("#alt10").text("Email must be filled out!");
        return false;
    }
    else{
        $("#alt10").text("");
    }
    
    var email1 = document.forms["clientForm"]["email1"].value;
    if (email1 == null || email1 == "")
    {
        $("#alt11").text("Email 2 must be filled out! If not have, enter NA");
        return false;
    }
    else{
        $("#alt11").text("");
    }
    
    var mbl = document.forms["clientForm"]["mbl"].value;
    if (mbl == null || mbl == "")
    {
        $("#alt12").text("Mobile No must be filled out!");
        return false;
    }
    else{
        $("#alt12").text("");
    }
    
    var mbl1 = document.forms["clientForm"]["mbl1"].value;
    if (mbl1 == null || mbl1 == "")
    {
        $("#alt13").text("Mobile No 1 must be filled out! If not have, enter NA");
        return false;
    }
    else{
        $("#alt13").text("");
    }
    
    var direct = document.forms["clientForm"]["direct"].value;
    if (direct == null || direct == "")
    {
        $("#alt14").text("Direct landline must be filled out! If not have, enter NA");
        return false;
    }
    else{
        $("#alt14").text("");
    }
    
    var std = document.forms["clientForm"]["std"].value;
    if (std == null || std == "")
    {
        $("#alt15").text("Boardline must be filled out! If not have, enter NA");
        return false;
    }
    else{
        $("#alt15").text("");
    }
    
    var buildno = document.forms["clientForm"]["buildno"].value;
    if (buildno == null || buildno == "")
    {
        $("#alt16").text("Address 1 must be filled out!");
        return false;
    }
    else{
        $("#alt16").text("");
    }
    
    var buildname = document.forms["clientForm"]["buildname"].value;
    if (buildname == null || buildname == "")
    {
        $("#alt17").text("Address 2 must be filled out!");
        return false;
    }
    else{
        $("#alt17").text("");
    }
    
    var streetno = document.forms["clientForm"]["streetno"].value;
    if (streetno == null || streetno == "")
    {
        $("#alt18").text("Address 3 must be filled out!");
        return false;
    }
    else{
        $("#alt18").text("");
    }
    
    var streetname = document.forms["clientForm"]["streetname"].value;
    if (streetname == null || streetname == "")
    {
        $("#alt19").text("Address 4 must be filled out!");
        return false;
    }
    else{
        $("#alt19").text("");
    }
      
    var city = document.forms["clientForm"]["city"].value;
    if (city == null || city == "")
    {
        $("#alt20").text("City must be filled out!");
        return false;
    }
    else{
        $("#alt20").text("");
    }
    
    var pincode = document.forms["clientForm"]["pincode"].value;
    if (pincode == null || pincode == "")
    {
        $("#alt21").text("Pincode must be filled out!");
        return false;
    }
    else{
        $("#alt21").text("");
    }
    
    var state = document.forms["clientForm"]["state"].value;
    if (state == null || state == "")
    {
        $("#alt22").text("State must be filled out!");
        return false;
    }
    else{
        $("#alt22").text("");
    }
    
    var country = document.forms["clientForm"]["country"].value;
    if (country == null || country == "")
    {
        $("#alt23").text("Country must be filled out!");
        return false;
    }
    else{
        $("#alt23").text("");
    }
    
    var noofemp = document.forms["clientForm"]["noofemp"].value;
    if (noofemp == null || noofemp == "")
    {
        $("#alt24").text("Client life cycle must be filled out!");
        return false;
    }
    else{
        $("#alt24").text("");
    }
     
    var clientsource = document.forms["clientForm"]["clientsource"].value;
    if (clientsource == null || clientsource == "")
    {
        $("#alt25").text("Client source must be filled out!");
        return false;
    }
    else{
        $("#alt25").text("");
    }
}

/* Client End */

/* Client Import Start */

function addClientImport() 
{
    var filename = document.forms["importForm"]["filename"].value;
    if (filename == null || filename == "")
    {
        $("#alt1").text("Import file must be filled out!");
        return false;
    }
    else{
        $("#alt1").text("");
    }
    
}

/* Client Import End */

/* Project Start */

$('#project_name').keyup(function() {
    var project_name = this.value;
    if(project_name!=''){ $("#alt3").text(""); }
});

$('#salevalue').keyup(function() {
    var salevalue = this.value;
    if(salevalue!=''){ $("#alt12").text(""); }
});



function addProject() 
{
    var opendate = document.forms["projectForm"]["opendate"].value;
    if (opendate == null || opendate == "")
    {
       $("#alt1").text("Opening date must be filled out!");
       return false;
    }
    else{
       $("#alt1").text("");
    }
    
    var cs_owner = document.forms["projectForm"]["cs_owner"].value;
    if (cs_owner == null || cs_owner == "")
    {
       $("#alt2").text("CS owner must be filled out!");
       return false;
    }
    else{
       $("#alt2").text("");
    }
    
   var project_name = document.forms["projectForm"]["project_name"].value;
   if (project_name == null || project_name == "")
   {
       $("#alt3").text("Project name must be filled out!");
       return false;
   }
   else{
       $("#alt3").text("");
   }
   
   var project_status = document.forms["projectForm"]["project_status"].value;
   if (project_status == null || project_status == "")
   {
       $("#alt4").text("Project status must be filled out!");
       return false;
   }
   else{
       $("#alt4").text("");
   }
   
   /*var project_track = document.forms["projectForm"]["project_track"].value;
   if (project_track == null || project_track == "")
   {
       $("#alt5").text("Project tracking must be filled out!");
       return false;
   }
   else{
       $("#alt5").text("");
   }
   
   var track_sdate = document.forms["projectForm"]["track_sdate"].value;
   if (track_sdate == null || track_sdate == "")
   {
       $("#alt6").text("Track start date must be filled out!");
       return false;
   }
   else{
       $("#alt6").text("");
   }
   
   var track_edate = document.forms["projectForm"]["track_edate"].value;
   if (track_edate == null || track_edate == "")
   {
       $("#alt7").text("Track end date must be filled out!");
       return false;
   }
   else{
       $("#alt7").text("");
   }*/
   
   var bu_no = document.forms["projectForm"]["bu_no"].value;
   if (bu_no == null || bu_no == "")
   {
       $("#alt8").text("Bu number must be filled out!");
       return false;
   }
   else{
       $("#alt8").text("");
   }
   
   var bu_member = document.forms["projectForm"]["bu_member"].value;
   if (bu_member == null || bu_member == "")
   {
       $("#alt9").text("BU member must be filled out!");
       return false;
   }
   else{
       $("#alt9").text("");
   }
   
   var client = document.forms["projectForm"]["client"].value;
   if (client == null || client == "")
   {
       $("#alt10").text("Client must be filled out!");
       return false;
   }
   else{
       $("#alt10").text("");
   }
   
   var product_sold = document.forms["projectForm"]["product_sold"].value;
   if (product_sold == null || product_sold == "")
   {
       $("#alt11").text("Product sold must be filled out!");
       return false;
   }
   else{
       $("#alt11").text("");
   }
   
   var salevalue = document.forms["projectForm"]["salevalue"].value;
   if (salevalue == null || salevalue == "")
   {
       $("#alt12").text("Estimate sales value must be filled out!");
       return false;
   }
   else{
       $("#alt12").text("");
   }
   
   var event_sdate = document.forms["projectForm"]["event_sdate"].value;
   if (event_sdate == null || event_sdate == "")
   {
       $("#alt13").text("Event start date must be filled out!");
       return false;
   }
   else{
       $("#alt13").text("");
   }
   
   var event_edate = document.forms["projectForm"]["event_edate"].value;
   if (event_edate == null || event_edate == "")
   {
       $("#alt14").text("Event end date must be filled out!");
       return false;
   }
   else{
       $("#alt14").text("");
   }
   
   var allot_ops = document.forms["projectForm"]["allot_ops"].value;
   if (allot_ops == null || salevalue == "")
   {
       $("#alt15").text("Ops manager must be filled out!");
       return false;
   }
   else{
       $("#alt15").text("");
   }
   
    
}

/* Project End */

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

/*$('#tax_applicable').keyup(function() {
   var tax_applicable = this.value;
   if(tax_applicable!=''){ $("#alt19").text(""); }
});*/

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
    
    var gst_certificate = document.forms["vendorForm"]["gst_certificate"].value;
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
    }
    
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
    
    var master_service_agreement = document.forms["vendorForm"]["master_service_agreement"].value;
    if (master_service_agreement == null || master_service_agreement == "")
    {
       //$("#alt31").text("Cancel cheque must be filled out!");
       //return false;
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
    }
    
    
}

function statusRestore(val) {
    var form = 'restoreForm-' + val;
    swal({
        title: "Are you sure?",
        text: "You want to restore to this vendor!",
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

function statusArchive(val) {
    var form = 'archiveForm-' + val;
    swal({
        title: "Are you sure?",
        text: "You want to archive to this vendor!",
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

/* Target Allocator Start */

$('#financial_year').keyup(function() {
   var financial_year = this.value;
   if(financial_year!=''){ $("#alt1").text(""); }
});


function addTargetallocator() 
{
    var financial_year = document.forms["targetallocatorForm"]["financial_year"].value;
    if (financial_year == null || financial_year == "")
    {
       $("#alt1").text("FY must be filled out!");
       return false;
    }
    else{
       $("#alt1").text("");
    }
}

/* Target Allocator End */


