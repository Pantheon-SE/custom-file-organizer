# Custom File Organizer

Custom File Organizer is a WordPress plugin that provides WP-CLI commands to organize files in the uploads directory. It also includes an admin interface for monitoring and managing file organization.

## Features

- Organizes files in the `wp-content/uploads` directory based on the first character of the filename.
- Provides an admin interface to monitor file movements and upload directory status.
- Supports WP-CLI commands for advanced file management.

## Installation

1. Clone or download the plugin from GitHub.
2. Upload the `custom-file-organizer` folder to your `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

### WP-CLI Commands

- **Scan Command**: Scans directories and lists those with more than 50,000 files.

```bash
wp file-organizer scan
```

- **Organize Command**: Organizes files in the upload directory. Includes a dry-run option.

```bash
wp file-organizer organize [--dry-run]
```

### Admin Interface

Navigate to the 'File Organizer' page in the WordPress admin area to view the file organization status and recent activities.

## Contributing

Contributions are welcome. Please create an issue or submit a pull request.

## License

This plugin is licensed under the GPL-2.0-or-later license. See the LICENSE file for details.
