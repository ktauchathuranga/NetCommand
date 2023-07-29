#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "YOUR-WIFI-NAME";
const char* password = "YOUR-WIFI-PASSWORD";

void setup() {
  Serial.begin(115200);
  //pinMode(27, OUTPUT);

  // Connect to Wi-Fi
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("WiFi connected");
}

void loop() {
  static String previousResponse;  // Variable to store the previous response
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;

    // Specify the target URL
    http.begin("https://YOUR-DOMAIN.com/api/command");

    // Set the data to be sent in the POST request
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String payload = "readstate=1";  // Add "readstate=1&value=1" for More

    // Send the POST request
    int statusCode = http.POST(payload);

    // Check the status code
    if (statusCode == 200) {
      // Request successful, read and print the response content
      String response = http.getString();
      Serial.print("Response: ");
      Serial.println(response);
      if (response != previousResponse) {  // Compare with the previous response
        previousResponse = response;  // Update the previous response
        if (response == "#1") {
          //digitalWrite(27, HIGH);
          Serial.println("writing high"); // DO WHAT EVER YOU WANT WHEN HIGH
        } else if (response == "#0") {
          //digitalWrite(27, LOW);
          Serial.println("writing low"); // DO WHAT EVER YOU WANT WHEN LOW
        }
      }
    } else {
      Serial.print("Error: HTTP status code ");
      Serial.println(statusCode);
    }

    http.end();
  }

  delay(5000); // Wait for 5 seconds before sending the next request
}
