# 🎯 Admin Text Changes Only - What Users See in wp-admin

## ⚠️ IMPORTANT: Only change display text, labels, and descriptions. Don't change:
- Function names
- Variable names  
- Database option keys
- CSS class names
- File names

**RULE: Only change text that users see in WordPress admin - NO code changes!**

---

## 📝 ADMIN MENU & PAGE TITLES

### **File:** `wp-content/plugins/[YOUR-PLUGIN-FOLDER]/inc/options/theme-option.php`
**Note:** Replace `[YOUR-PLUGIN-FOLDER]` with your actual plugin folder name:
- If folder is `eergx-plugin`, use: `wp-content/plugins/eergx-plugin/inc/options/theme-option.php`
- If folder is `elnakieb-plugin`, use: `wp-content/plugins/elnakieb-plugin/inc/options/theme-option.php`

**Line ~21:** Change menu title
```php
'menu_title' => 'Elnakieb Options',
```

**Line ~30:** Change framework title (top of options page)
```php
'framework_title' => wp_kses_post( 'Elnakieb Options <small>by Elnakieb Team</small>' ),
```

**Line ~30:** Change footer text (bottom of options page)
```php
'footer_text' => wp_kses_post( 'Developed by Elnakieb' ),
```

---

## 📋 OPTION LABELS & DESCRIPTIONS

### **File:** `wp-content/plugins/elnakieb-plugin/inc/options/theme-option.php`

**Change all text domains in labels:**
```php
// Find and replace ONLY in esc_html__() functions:
'eergx-tools' → 'elnakieb-plugin'

// Examples:
esc_html__( 'Enable Preloader', 'eergx-tools' ) → esc_html__( 'Enable Preloader', 'elnakieb-plugin' )
esc_html__( 'Header', 'eergx-tools' ) → esc_html__( 'Header', 'elnakieb-plugin' )
esc_html__( 'Footer Options', 'eergx-tools' ) → esc_html__( 'Footer Options', 'elnakieb-plugin' )
```

---

## 🏷️ DEFAULT VALUES & CONTENT

### **File:** `wp-content/plugins/eergx-plugin/inc/options/theme-option.php`

**Line ~425:** Default footer copyright text
```php
'default' => '© 2025 Elnakieb - LSC. All rights reserved.',
```

---

## 🎨 THEME NAME IN ADMIN

### **File:** `wp-content/themes/eergx/style.css`
```css
/*
Theme Name: Elnakieb Solar Energy Theme
Description: Professional Solar Energy WordPress Theme
Author: Elnakieb
*/
```

### **File:** `wp-content/themes/eergx-child/style.css`
```css
/*
Theme Name: Elnakieb Child Theme
Description: Child theme for Elnakieb Solar Energy Theme
Author: Elnakieb
*/
```

---

## 🔧 PLUGIN NAME IN ADMIN

### **File:** `wp-content/plugins/eergx-plugin/eergx-plugin.php`
```php
/*
Plugin Name: Elnakieb Theme Plugin
Description: Required plugin for Elnakieb Solar Energy Theme functionality
Author: Elnakieb
*/
```

---

## ✅ WHAT USERS WILL SEE CHANGED:

- **Admin Menu:** "Elnakieb Options" instead of old name
- **Options Page Title:** "Elnakieb Options by Elnakieb Team"
- **Theme Name:** "Elnakieb Solar Energy Theme" in Appearance > Themes
- **Plugin Name:** "Elnakieb Theme Plugin" in Plugins page
- **Footer Copyright:** Shows Elnakieb branding by default
- **All Option Labels:** Use "elnakieb-plugin" text domain

---

## 🚫 WHAT TO NEVER CHANGE:

- Function names (keep `preloader`, etc.)
- CSS classes (keep `.eergx-`, `.egx-`, etc.)
- Database keys (keep `eergx_template_type`, etc.)
- File/folder names
- Widget internal names
- Post type names

**Result: Clean admin interface with Elnakieb branding, all functionality preserved!**


### 8. **Theme README**
**File:** `wp-content/themes/eergx/readme.txt`
```
=== Elnakieb ===
Contributors: elnakieb
Tags: solar, energy, business, corporate, clean
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 1.0.0
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


### 3. **Theme Style Header**
**File:** `wp-content/themes/eergx/style.css`
```css
/*
Theme Name: Elnakieb
Description: Solar Energy WordPress Theme - Professional and Modern
Author: Elnakieb
Author URI: https://elnakieb.online/
Version: 1.0.0
Text Domain: elnakieb
*/
```