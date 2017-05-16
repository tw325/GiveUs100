//get Time Stamp values for input forms

//volunteerRequest page
document.getElementById('volunteerResOfferDate').value = Date();

//donationRequest page
document.getElementById('donationResOfferDate').value = Date();

//requestOffer page
document.getElementById('volunteerResRequestDate').value = Date();

//donationOffer page
document.getElementById('donationResRquestDate').value = Date();


function toggle($id){
    var subitem = document.getElementsByClassName($id);
    
    if (subitem.style.display == "none" )
        subitem.style.display = "block";
    else
        subitem.style.display = "none";
}
