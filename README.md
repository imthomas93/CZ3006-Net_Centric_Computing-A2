# CZ3006-Net_Centric_Computing-A2
This assignment aims to enhance students' understanding of Web client-side programming techniques using JavaScript and Web server-side programming techniques using PHP.

## Feature of Client Application
An HTML document to create a form that contains:
1. A text box to collect the user’s name.
2. Three text boxes for the user to key in the the following
```
numbers of apples (69 cents each)
numbers of oranges (59 cents each)
numbers of bananas (39 cents each)
```
3. Whenever the user’s input in any of these text boxes changes, the validity of the input is checked at the client side using JavaScript. A valid input is defined as a sequence of one or more digits. If the input is not valid, an alert message is produced and the user is asked to input again.
4. A text box showing the total cost of the user’s order. The purpose of this text box is to show the total cost of order to the user during his selection. This text box is not for user’s input, so it should be blurred whenever it acquires focus. Whenever the user’s input in any of the above three text boxes changes, if the input is not valid, this text box should display “NaN”, and if the input is valid, the total cost of the user’s order is recalculated and displayed in this text box. Calculation is to be done completely at the client side using JavaScript.
5. A collection of three radio buttons that are labeled as Visa, MasterCard and Discover. This is for the user to input his payment method.
6. A Submit button. On completing the form, the user clicks this button to submit his order to the web server.


## Feature of Server Application
1. Receives the user’s order when the Submit button on the above HTML document is clicked. On receiving the order, the server-side PHP program computes the total cost of the user’s order and returns an HTML document to the user as a receipt. 
2. The receipt should specify the user’s name, what are ordered and the payment method in the form of a table. In addition, the server-side PHP program must also update a file named “order.txt” stored on the web server to reflect the new order. 
3. The file records the total numbers of apples, oranges and bananas ordered by all users so far in the following format:
```
Total number of apples: 12
Total number of oranges: 23
Total number of bananas: 35
```

## Author
Thomas Lim Jun Wei

## Acknowledgement
Prof Limo for the assingment tasking and lecture guide.
