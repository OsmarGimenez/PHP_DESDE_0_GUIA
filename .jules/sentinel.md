## 2024-06-01 - Reflected XSS in User Output
**Vulnerability:** A Reflected Cross-Site Scripting (XSS) vulnerability was found in `app/Views/04.operadores.php` where user input from `$_GET['user']` was echoed directly to the page without sanitization.
**Learning:** The vulnerability existed because the developer used the null coalescing operator (`??`) to provide a fallback value ("Invitado") but forgot to sanitize the primary value if it was provided by the user.
**Prevention:** Always use `htmlspecialchars()` (or a similar sanitization function) when echoing data retrieved from untrusted sources like `$_GET`, `$_POST`, or `$_COOKIE`, even when a safe fallback value is provided.
