function getRepositories() {
    var username = document.getElementById("username").value;   
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
   
    // Set the callback function to handle the response
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Parse the JSON response
        var response = JSON.parse(xhr.responseText);
       
        var repositoryList = "";
        document.getElementById("repo").innerText = "List of Repositories"
          for (var i = 0; i < response.length; i++) {
            repositoryList += "<li>" + response[i].name + "</li>";
          }
          document.getElementById("repositoryList").innerHTML = "<ul>" + repositoryList + "</ul>";
      }
      else{
        document.getElementById('repositoryList').textContent = '';
        document.getElementById('repo').textContent = '';

      }
    };
   
    // Send the request to the GitHub API
    xhr.open("GET", "https://api.github.com/users/" + username + "/repos", true);
    xhr.send();
  }


  function fetchData() {
  var xhr = new XMLHttpRequest();
  var username = document.getElementById("username").value;
  xhr.open('GET', 'https://api.github.com/users/' + username);

  // Set the callback function for the onreadystatechange event
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Parse the response data
        var data = JSON.parse(xhr.responseText);

        // Extract the information you want to display
        var name = data.name;

        // Update the container element with the extracted information
        document.getElementById('name').textContent = "Username: "+ name;

      }
      else if (username== ""){
        document.getElementById('name').textContent = 'Please enter username';

      }
      else {
        document.getElementById('name').textContent = 'User Name Not found';
      }
    }
  };
  // Send the request
  xhr.send();
}
