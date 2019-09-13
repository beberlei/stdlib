# stdlib PHP

Just some fun with a new standard library for PHP inspired by golangs standard
library.

### Strings Namespace

```php

use php\strings;

strings\compare("foo", "bar");
strings\contains("foobar", "foo");
strings\has_prefix("foobar", "foo"); // true
strings\has_suffix("foobar", "bar"); // true
$idx = strings\index("foobar", "bar"); // 3
$idx = strings\last_index("foobarbar", "bar"); // 6
strings\join(["foo", "bar"], " "); // "foo bar"
strings\map('str_rot13', 'Hello World!');
strings\repeat('foo', 3); // 'foofoofoo'
strings\replace('foo', 'o', 'O', 1); // 'fOo'
strings\split('hello world', ' '); // ['hello', 'world']
strings\to_lower('FOO'); // foo
strings\to_upper('foo'); // FOO
strings\trim(' foo '); // "foo"
strings\trim_left(' foo'); // 'foo'
strings\trim_right('foo '); // 'foo'
```
