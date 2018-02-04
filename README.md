# OSF Exception component

The root OSF exceptions have a type corresponding to the underlying processing.
In this way, they can be used explicitly to display errors, perform rollback
processing, record debugging information, or issue alerts.

## Exception types

* **ArchException**: to report a technical malfunction
* **DisplayedException**: displayed to the end user
* **DbException**: used to perform databases rollbacks
* **PhpErrorException**: PHP error handling
* **OsfException**: root exception of OSF components
* **AlertException**: launch a bootstrap alert (require osflab/view)
* **HttpException**: generate an error with a specific HTTP code

These exceptions are used in OSF-based components and applications.