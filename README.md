# pos-system
Response schema: JSON Object { "success": boolean, "message_code": string, "body": Array }

GET /transaction

Fetches all transaction
Request Arguments: None
404 will be returned if no item was found
POST api/transactions/create

creates new transaction
Request Arguments: {"item_name": string},{"quantity": integer}

422 will be returned if name param was not found
POST api/transactions/update

updates the quantity 
Request Arguments: {"id": integer},{"quantity": integer}
422 will be returned if id param was not found
404 will be retruned if no item was found
PUT api/transactions/delete

deletes transaction
Request Arguments: {"id": integer}
422 will be returned if id param was not found
