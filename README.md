# This module will alter the existing Drupal "Site Information" form.
 
 
Features
--------
* Creates a new form text field named "Site API Key" to the "Site Information" form with the default value of “No API Key yet”.
* Site API Key will save in system variable named "siteapikey".
* A Drupal message should inform the user that the Site API Key has been saved with Site API Key.
* The text of the "Save configuration" button should change to "Update Configuration".
* This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".

## Example API URL

http://localhost/page_json/{siteapikey}/{nid}



