# Football Club Management UI Kit
## Professional Component Library & Documentation

---

## 📋 Table of Contents

1. [Overview](#overview)
2. [File Structure](#file-structure)
3. [Getting Started](#getting-started)
4. [Color System](#color-system)
5. [Typography](#typography)
6. [Components](#components)
7. [JavaScript Classes](#javascript-classes)
8. [Animations](#animations)
9. [Utilities](#utilities)
10. [Responsive Design](#responsive-design)
11. [Accessibility](#accessibility)
12. [Best Practices](#best-practices)

---

## Overview

A comprehensive, production-ready UI Kit for Football Club Management Systems. Built with:
- **HTML5** - Semantic markup
- **CSS3** - Advanced features (Grid, Flexbox, Glassmorphism)
- **Vanilla JavaScript** - No dependencies required
- **Lucide Icons** - Icon ready (use emoji or icon libraries)

### Key Features

✅ Fully separated files (HTML, CSS, JS)
✅ Professional sports/athletic theme
✅ Glassmorphism effects
✅ Smooth animations & transitions
✅ Form validation & error handling
✅ Table filtering & pagination
✅ Responsive design (mobile, tablet, desktop)
✅ Accessibility compliant
✅ Dark mode ready
✅ Production optimized

---

## File Structure

```
football-club-ui-kit/
│
├── index.html              # Dashboard homepage
├── tables.html             # Players management table
├── forms.html              # Forms & data entry
│
├── styles.css              # All custom styles & animations
├── scripts.js              # All JavaScript functionality
│
└── README.md               # This documentation
```

### File Purposes

**styles.css** (1000+ lines)
- CSS variables for theming
- Typography & base styles
- Form elements styling
- Button variants
- Card & container styles
- Glassmorphism effects
- Custom scrollbars
- 12+ animations
- Utility classes
- Responsive breakpoints
- Accessibility features

**scripts.js** (500+ lines)
- Sidebar management
- Form validation
- Table filtering & pagination
- Dropdown menus
- Modal dialogs
- Tabs interface
- Tooltips
- Utility functions
- Event handling

**HTML Pages**
- Semantic structure
- Proper linking to CSS/JS
- Accessible markup
- Meta tags
- Sample content

---

## Getting Started

### 1. Setup
```bash
# Copy all files to your project directory
football-club-ui-kit/
├── index.html
├── tables.html
├── forms.html
├── styles.css
├── scripts.js
└── README.md
```

### 2. Link Files in HTML Head
```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Content -->
    <script src="scripts.js"></script>
</body>
</html>
```

### 3. Initialize Components
Components auto-initialize on DOM ready. No manual setup needed!

---

## Color System

### CSS Variables (defined in :root)

```css
:root {
    /* Primary Colors */
    --primary-dark: #0f172a;          /* Deep Navy */
    --primary-navy: #1a1f35;          /* Navy gradient */
    --primary-slate: #1e293b;         /* Slate blue */

    /* Accent Colors */
    --accent-green: #22c55e;          /* Emerald Green (primary) */
    --accent-green-dark: #16a34a;     /* Dark green */
    --accent-green-light: #86efac;    /* Light green */

    /* Text Colors */
    --text-primary: #0f172a;          /* Headings */
    --text-secondary: #64748b;        /* Body text */
    --text-tertiary: #94a3b8;         /* Hints */

    /* Background Colors */
    --bg-light: #f8fafc;              /* Light bg */
    --bg-lighter: #f1f5f9;            /* Lighter bg */

    /* Semantic Colors */
    --success-green: #22c55e;
    --error-red: #ef4444;
    --warning-orange: #f59e0b;
    --info-blue: #3b82f6;
}
```

### Using Colors

```css
/* In your custom CSS */
color: var(--accent-green);
background: var(--bg-light);
border-color: var(--border-color);
```

### Customizing Theme

Edit `:root` variables to change entire theme:

```css
:root {
    --accent-green: #0ea5e9;  /* Change to blue */
    --primary-dark: #1e3a8a;  /* Change to dark blue */
    /* ... other variables ... */
}
```

---

## Typography

### Font Stack
```css
font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 
             Roboto, 'Helvetica Neue', Arial, sans-serif;
```

### Heading Sizes
- **h1**: 2.5rem (40px)
- **h2**: 1.875rem (30px)
- **h3**: 1.5rem (24px)
- **h4**: 1.25rem (20px)

### Text Utilities
```html
<p class="text-sm">Small text</p>
<p class="text-md">Medium text</p>
<p class="text-lg">Large text</p>
<p class="font-bold">Bold</p>
<p class="font-semibold">Semibold</p>
<p class="text-muted">Muted color</p>
```

---

## Components

### 1. Buttons

#### Variants
```html
<!-- Primary -->
<button class="btn btn-primary">Primary</button>

<!-- Secondary -->
<button class="btn btn-secondary">Secondary</button>

<!-- Outline -->
<button class="btn btn-outline">Outline</button>

<!-- Ghost -->
<button class="btn btn-ghost">Ghost</button>

<!-- Danger -->
<button class="btn btn-danger">Delete</button>
```

#### Sizes
```html
<button class="btn btn-sm">Small</button>
<button class="btn">Medium</button>
<button class="btn btn-lg">Large</button>
<button class="btn btn-block">Full Width</button>
```

#### With Icons
```html
<button class="btn btn-primary">
    <span>📝</span> Edit
</button>
```

#### Loading State
```html
<button class="btn btn-primary loading">Loading...</button>
```

### 2. Forms

#### Text Input
```html
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" class="input-field" 
           placeholder="Enter name" required>
</div>
```

#### Input with Icon
```html
<div class="input-with-icon">
    <input type="email" class="input-field" placeholder="Email">
    <span class="icon">📧</span>
</div>
```

#### Select
```html
<select class="input-field">
    <option>Option 1</option>
    <option>Option 2</option>
</select>
```

#### Textarea
```html
<textarea class="input-field" placeholder="Enter text..."></textarea>
```

#### Validation
```javascript
// Auto-validate on form submission
new FormValidator('form');

// Fields support attributes:
<input type="email" required>
<input type="password" data-minlength="8">
<input type="tel" required>
```

### 3. Tables

#### Basic Table
```html
<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data 1</td>
                <td>Data 2</td>
            </tr>
        </tbody>
    </table>
</div>
```

#### With Search & Filter
```html
<!-- Search bar -->
<input class="input-field" data-table-search placeholder="Search...">

<!-- Filter -->
<select data-table-filter="column-name">
    <option value="">All</option>
    <option value="Active">Active</option>
</select>

<!-- Initialize -->
<script>
    new TableManager('table');
</script>
```

#### With Pagination
```html
<div class="pagination-wrapper">
    <div data-pagination="info">Showing...</div>
    <div class="pagination-controls">
        <button data-pagination="prev">Previous</button>
        <button data-pagination="next">Next</button>
    </div>
</div>
```

### 4. Cards

#### Basic Card
```html
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
    </div>
    <div class="card-body">Content</div>
    <div class="card-footer">
        <button class="btn btn-primary">Action</button>
    </div>
</div>
```

### 5. Badges

```html
<span class="badge badge-success">Active</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-danger">Danger</span>
<span class="badge badge-info">Info</span>
```

### 6. Sidebar Navigation

#### Markup
```html
<aside class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <div class="sidebar-logo-icon">⚽</div>
            <span>Club Name</span>
        </div>
    </div>
    <nav class="sidebar-nav">
        <a href="#" class="nav-item active">
            <span class="nav-item-icon">📊</span>
            <span>Dashboard</span>
        </a>
    </nav>
</aside>
```

#### JavaScript
```javascript
new Sidebar(); // Auto-initializes
```

### 7. Modal Dialog

#### Markup
```html
<div class="modal-overlay">
    <div class="modal">
        <h2>Modal Title</h2>
        <p>Modal content...</p>
        <button data-action="close">Close</button>
    </div>
</div>
```

#### JavaScript
```javascript
const modal = new Modal('.modal');
modal.open();
modal.close();
```

### 8. Glassmorphism

```html
<!-- Light glass effect -->
<div class="glass">Content</div>

<!-- Dark glass effect -->
<div class="glass-dark">Content</div>
```

---

## JavaScript Classes

### Sidebar
```javascript
const sidebar = new Sidebar();
sidebar.toggle();  // Toggle open/close
sidebar.open();    // Open
sidebar.close();   // Close
```

**Features:**
- Responsive toggle
- Mobile auto-close
- Active state management

### FormValidator
```javascript
const form = new FormValidator('form');
```

**Features:**
- Real-time validation
- Error message display
- Custom rules (email, minLength, phone, etc.)
- Loading states
- Notifications

**Validation attributes:**
```html
<input type="email" required>
<input type="password" data-minlength="8">
<input type="tel" required>
<input data-match="password">
```

### TableManager
```javascript
const table = new TableManager('table');
```

**Features:**
- Search functionality
- Multi-column filtering
- Pagination (10 items per page)
- Row highlighting
- Customizable items per page

**Data attributes:**
```html
<input data-table-search>
<select data-table-filter="column">
<button data-pagination="prev">
<button data-pagination="next">
<div data-pagination="info">
```

### Modal
```javascript
const modal = new Modal('.modal');
modal.open();
modal.close();
```

**Features:**
- Click outside to close
- Escape key support
- Smooth animations
- Body scroll prevention

### Dropdown
```javascript
new Dropdown('[data-dropdown="name"]');
```

### Tabs
```javascript
new Tabs('[data-tabs="name"]');
```

### Tooltip
```javascript
new Tooltip();
// Renders automatically on elements with data-tooltip
```

---

## Animations

### Predefined Keyframes

```css
@keyframes slideInUp    { /* Slide from bottom */ }
@keyframes slideInDown  { /* Slide from top */ }
@keyframes slideInLeft  { /* Slide from left */ }
@keyframes slideInRight { /* Slide from right */ }
@keyframes fadeIn       { /* Fade in */ }
@keyframes scaleIn      { /* Scale from small */ }
@keyframes spin         { /* Rotation */ }
@keyframes pulse        { /* Pulse effect */ }
@keyframes bounce       { /* Bounce effect */ }
@keyframes shimmer      { /* Shimmer effect */ }
```

### Using Animations

```html
<div class="animate-slide-up">Content</div>
<div class="animate-fade-in">Content</div>
<div class="animate-scale-in">Content</div>
<div class="animate-pulse">Content</div>
```

### CSS Variables for Transitions
```css
--transition-fast: 150ms    /* Quick transitions */
--transition-base: 300ms    /* Standard */
--transition-slow: 500ms    /* Slow/elegant */
```

---

## Utilities

### Spacing Classes
```html
<!-- Margin Top -->
<div class="mt-sm">...</div>
<div class="mt-md">...</div>
<div class="mt-lg">...</div>

<!-- Margin Bottom -->
<div class="mb-sm">...</div>
<div class="mb-md">...</div>
<div class="mb-lg">...</div>

<!-- Padding -->
<div class="p-md">...</div>
<div class="p-lg">...</div>
```

### Display & Flexbox
```html
<div class="flex">Flex container</div>
<div class="flex-col">Flex column</div>
<div class="flex-center">Centered content</div>
<div class="flex-between">Space between</div>
<div class="gap-md">Gap between items</div>
```

### Grid
```html
<div class="grid grid-cols-2">2 columns</div>
<div class="grid grid-cols-3">3 columns</div>
```

### Text Colors
```html
<p class="text-success">Success text</p>
<p class="text-danger">Danger text</p>
<p class="text-warning">Warning text</p>
<p class="text-info">Info text</p>
```

### Other Utilities
```html
<div class="text-center">Centered text</div>
<div class="cursor-pointer">Clickable</div>
<div class="opacity-50">50% opacity</div>
<div class="rounded-lg">Rounded corners</div>
<div class="shadow-lg">Large shadow</div>
```

### Global Functions (window.UI)
```javascript
// Show notification
UI.notify('Message', 'success');  // success, error, warning, info

// Toggle loading
UI.setLoading(element, true);

// Format date
UI.formatDate(new Date(), 'MMM DD, YYYY');

// Copy to clipboard
UI.copyToClipboard('text to copy');

// Debounce function
const debounced = UI.debounce(callback, 300);
```

---

## Responsive Design

### Breakpoints
```css
@media (max-width: 1024px) { /* Tablet landscape */ }
@media (max-width: 768px)  { /* Tablet & mobile */ }
```

### Mobile-First Approach
All styles are mobile by default, desktop enhancements via media queries.

### Sidebar Behavior
- **Desktop**: Fixed sidebar at 280px
- **Tablet/Mobile**: Collapsible sidebar (hidden by default)

### Grid Adjustments
```css
.grid-cols-3 @1024px → 2 columns
.grid-cols-2 @768px  → 1 column
```

---

## Accessibility

### Keyboard Navigation
- Tab through interactive elements
- Enter/Space to activate buttons
- Arrow keys in menus
- Escape to close modals

### ARIA Attributes
```html
<button aria-label="Close menu">×</button>
<div role="tab" aria-selected="true"></div>
<div role="tabpanel" hidden></div>
```

### Color Contrast
All text meets WCAG AA standards (4.5:1 ratio).

### Focus States
All interactive elements have visible focus indicators.

### Reduced Motion
Animations respect `prefers-reduced-motion` preference.

### Form Labels
All inputs have associated labels (either visible or aria-label).

---

## Best Practices

### 1. Form Validation
```javascript
// Always use FormValidator for forms
new FormValidator('form');

// Add validation attributes
<input type="email" required>
<input type="password" data-minlength="8">
<input type="tel" data-match="phone_confirm">
```

### 2. Table Management
```javascript
// Always use TableManager for tables
new TableManager('table');

// Ensure proper data attributes
<input data-table-search>
<select data-table-filter="column">
```

### 3. Modal Usage
```html
<!-- Always use proper structure -->
<div class="modal-overlay" id="myModal">
    <div class="modal">
        <button data-action="close">Close</button>
    </div>
</div>

<script>
const modal = new Modal('.modal');
modal.open();
</script>
```

### 4. Responsive Images
```html
<!-- Use proper responsive attributes -->
<img src="image.jpg" alt="Description" 
     style="max-width: 100%; height: auto;">
```

### 5. Performance
- Minimize CSS (remove unused classes)
- Defer non-critical JavaScript
- Use CSS variables for theming (single point of change)
- Optimize images and assets
- Use semantic HTML for better SEO

### 6. Customization
- Modify CSS variables in `:root` for theme changes
- Don't override utility classes, use CSS variables instead
- Create new animations by extending `@keyframes`
- Extend button classes for custom variants

### 7. Browser Support
- Chrome/Edge: Full support
- Firefox: Full support
- Safari: Full support (11+)
- Mobile browsers: Full support

---

## Code Examples

### Complete Form Example
```html
<form>
    <div class="form-group">
        <label for="name">Full Name *</label>
        <input type="text" id="name" class="input-field" 
               required>
    </div>

    <div class="form-group two-col">
        <div>
            <label for="email">Email *</label>
            <input type="email" id="email" class="input-field" 
                   required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" class="input-field">
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
        <button type="reset" class="btn btn-outline">
            Clear
        </button>
    </div>
</form>

<script>
new FormValidator('form');
</script>
```

### Complete Table Example
```html
<input class="input-field" data-table-search 
       placeholder="Search...">

<select class="input-field" data-table-filter="status">
    <option value="">All</option>
    <option value="Active">Active</option>
</select>

<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th data-column="status">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td data-column="status">Active</td>
            </tr>
        </tbody>
    </table>

    <div class="pagination-wrapper">
        <div data-pagination="info">Showing...</div>
        <button data-pagination="prev">Previous</button>
        <button data-pagination="next">Next</button>
    </div>
</div>

<script>
new TableManager('table');
</script>
```

---

## Troubleshooting

### Styles not applying?
- Verify `styles.css` is linked in `<head>`
- Check file path is correct
- Clear browser cache (Ctrl+Shift+Del)
- Check for CSS conflicts

### JavaScript not working?
- Verify `scripts.js` is loaded before closing `</body>`
- Check browser console for errors (F12)
- Ensure data attributes match class selectors
- Verify required HTML structure

### Sidebar not toggling?
- Check `data-toggle="sidebar"` button exists
- Verify Sidebar class is initialized
- Check browser width (mobile breakpoint at 768px)

### Forms not validating?
- Verify FormValidator is initialized on form
- Check input attributes (required, type, etc.)
- Check form has `<form>` tag
- Verify submit button has `type="submit"`

### Tables not filtering?
- Check `data-table-search` and `data-table-filter` attributes
- Verify TableManager is initialized
- Check data attributes match exactly
- Ensure table has `<tbody>` with rows

---

## Support & Resources

- Review code comments for additional details
- Check inline documentation in each class
- Examine HTML examples in provided pages
- Test in browser developer tools (F12)

---

## Changelog

### Version 1.0
- Initial release
- Complete component library
- Full documentation
- Production ready

---

## License

Available for commercial and educational use.

---

**Built with ❤️ for Football Club Management Systems**

Last Updated: April 2026
