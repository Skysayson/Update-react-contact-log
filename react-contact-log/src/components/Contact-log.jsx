import axios from "axios";
import React, { useEffect, useState } from "react";
import "./ContactLog.css";

function ContactLog() {
  const [contacts, setContacts] = useState([]);

  useEffect(() => {
    const apiUrl = "http://localhost/CONTACT-LOG-REACT/another-react-log/react-contact-log/src/php/Loadcontacts.php"

    axios
      .get(apiUrl)
      .then((response) => {
        setContacts(response.data);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  }, []);

  return (
    <div className="">
      <div className="">
        <table className="flex flex-col w-auto border border-black rounded-x bg-[#17d071] text-sm text-left text-gray-500 dark:text-gray-400">
          <tr className="flex text-white">
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Contact#</th>
          </tr>
          {contacts.length === 0 ? (
            <tr>
              <td>No contacts available.</td>
            </tr>
          ) : (
            contacts.map((contact) => (
              <tr key={contact.email} className="flex text-white">
                <td>{contact.lastName}</td>
                <td>{contact.firstName}</td>
                <td>{contact.email}</td>
                <td>{contact.contact}</td>
              </tr>
            ))
          )}
        </table>
      </div>
    </div>
  );
}

export default ContactLog;
