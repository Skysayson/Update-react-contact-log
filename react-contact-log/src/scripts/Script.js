export function AddContact() 
{
  const newLastName = prompt("Enter Lastname");
  const newFirstName = prompt("Enter Firstname");
  const newEmail = prompt("Enter Email");
  let newContact = prompt("Enter Contact#");
  newContact = parseInt(newContact);
  let emailDomain = ["@gmail.com", "@hotmail.com", "@yahoo.com"];

  const containDomain = emailDomain.some((domain) =>
    new RegExp(`${domain}$`).test(newEmail)
  );

  if (
    newLastName !== null &&
    newLastName !== "" &&
    newFirstName !== null &&
    newFirstName !== "" &&
    newEmail !== null &&
    newEmail !== "" &&
    Number.isInteger(newContact) &&
    containDomain === true
  ) {
    const newContactObject = {
      last_name: newLastName,
      first_name: newFirstName,
      email: newEmail,
      contact_num: newContact,
    };

    $.ajax({
      url: "http://localhost/CONTACT-LOG-REACT/another-react-log/react-contact-log/src/php/Addcontact.php",
      method: "POST",
      data: newContactObject,
      success: function (response) {
        console.log(response);
        window.location.reload();
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", error);
      },
    });
  } else {
    alert("Bad test");
  }
}

export function deleteContact() 
{
    const delLast = prompt("Enter lastname to delete");

    if(delLast != []) {
        const delObj = {
          deleteLast: delLast,
        };
    
        $.ajax({
          url: "http://localhost/CONTACT-LOG-REACT/another-react-log/react-contact-log/src/php/Deletecontact.php",
          method: "POST",
          data: delObj,
          success: function (response) {
            console.log(response);
            window.location.reload();
          },
          error: function (xhr, status, error) {
            console.error("AJAX error:", error);
          },
        });
      } else {
        alert("Field cannot be empty");
      }
}

export function updateContact() 
{
    const upCon = prompt("Enter Lastname to update");
    let choice = prompt("Lastname: 1, Firstname: 2, Email: 3, Contact: 4");
    const upVal = prompt("Update to?");
    
    choice = Number(choice);

    if(choice < 5 && choice > 0 && upCon != []) {
        const upObj = {
            upChoice: choice,
            upVal: upVal,
            upCon: upCon,
        };

        $.ajax({
            url: "http://localhost/CONTACT-LOG-REACT/another-react-log/react-contact-log/src/php/Updatecontact.php",
            method: "POST",
            data: upObj,
            success: function (response) {
              console.log(response);
              window.location.reload();
            },
            error: function (xhr, status, error) {
              console.error("AJAX error:", error);
            },
          });

    } else {
        alert("Something went wrong");
    }
}
