# TsvLib
Library of classes and functions

## Singleton

Simplest pattern. We can doing anything and be sure Singleton is exactly only one instance in program;

```php
   
   declare(strict_type=1);
   
   namespace MyNamespace;
   
   use \TsvLib\Singleton;
   
   class MyClass extends Singleton 
   {
          
   }
```