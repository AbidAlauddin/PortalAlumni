# Fixes Applied to Companies/Lowongan Create and Index Functions

## Issues Identified and Fixed:
1. **User Model Missing user_id Accessor**: Added `getCompanyIdAttribute()` to User model to allow `Auth::user()->user_id` to work.
2. **Incorrect Query in Index.php**: Changed from `where('user_id', Auth::user()->user_id)` to `where('user_id', Auth::user()->user_id)` to filter jobs by company.
3. **Layout Title Not Dynamic**: Updated dashboard.blade.php to use `@yield('title')` instead of hardcoded title.

## Files Modified:
- `app/Models/User.php`: Added user_id accessor.
- `app/Livewire/Companies/lowongan/Index.php`: Fixed job query filter.
- `resources/views/layouts/dashboard.blade.php`: Made title dynamic.

## Next Steps:
- Test the application to ensure pages display content properly.
- Verify that create and index functions work as expected.
