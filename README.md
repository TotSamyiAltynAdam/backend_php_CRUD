## Account Management System
This project is an account management system where users can create an account, login securely, manage their billing and shipping addresses, and view their personal information. Below are the detailed requirements and specifications:

### User Authentication
- Users must create an account to access the system.
- Secure login functionality is implemented.
- User authentication ensures that each user can only access their own information.
- User passwords are stored securely and are not visible during input.

### User Account Management
Users can create an account with the following information:
- Login (Primary key, max length: 15)
- First name (Max length: 25)
- Last name (Max length: 60)
- Email address (Max length: 40)
- Password (encrypted) (Encrypted password, max length: 60)
- Option to subscribe to newsletters  (Radio input: Yes/No)

Upon login, users can view and update their personal information, except for the login name.

Account creation and login pages are included.

### Billing and Shipping Address Management
Users can insert, update, or delete their billing and shipping addresses.

Shipping  includes the following information:
- ShippingID (Max length: 30)
- Login (Matches P2User, disabled input on PHP pages)
- Name (Max length: 50)
- Address (Max length: 30)
- City (Max length: 30)
- State (Max length: 20)
- Zip (Max length: 10)

Billing  includes the following information:
- BillingID (Max length: 30)
- Login (Matches P2User, disabled input on PHP pages)
- BillName (Max length: 50)
- BillAddress (Max length: 30)
- BillCity (Max length: 30)
- BillState (Max length: 20)
- BillZip (Max length: 10)
- CardType (Select or radio input: Visa, MasterCard, Discover, American Express)
- CardNumber (Encrypted card number, max length: 16)
- ExpDate (Format: MM/YY, select dropdowns for month and year, max length: 5)


______
## File Structure
The project consists of the following files:

- Landing Page: 
    index.php
- User Authentication:
    Pages for creating a new login
    Login page and processing
- User Information Management:
    Pages to display and update user information
- Shipping Address Management:
    Pages to display shipping addresses
    Functionality to insert, update, and delete addresses
- Billing Information Management:
    Pages to display billing information
    Functionality to insert, update, and delete information
- Logout Option: 
    Included on every page after user login with corresponding functionality.
    The system ensures data security, input validation, and proper sanitation to prevent code disruption and enhance user experience.