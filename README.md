# Consecutive Date

A PHP library for finding and counting consecutive dates in a sequence. This library provides a simple and efficient way to determine consecutive date patterns, useful for tracking streaks, daily logins, or any sequential date-based calculations.

## Features

- Count consecutive dates backwards from a given date
- Count consecutive dates forwards from a given date
- Support for custom date formats
- Works with both DateTime objects and date strings
- Zero dependencies
- Type-safe implementation
- PSR-4 compliant

## Installation

You can install the package via composer:

```bash
composer require d34dman/consecutive-date
```

## Usage

### Basic Usage with DateTime Objects

```php
use D34dman\ConsecutiveDate\ConsecutiveDate;

// Create a list of DateTime objects
$dateList = [
    new DateTime("2024-03-15"),
    new DateTime("2024-03-14"),
    new DateTime("2024-03-13"),
    new DateTime("2024-03-12"),
    new DateTime("2024-03-10"), // Note the gap here
];

// Count consecutive days backwards from a specific date
$currentDate = new DateTime("2024-03-15");
$consecutiveDays = ConsecutiveDate::countPastDays($currentDate, $dateList, "Y-m-d");
// Result: 4 (March 15, 14, 13, 12)

// Count consecutive days forwards
$startDate = new DateTime("2024-03-12");
$consecutiveDays = ConsecutiveDate::countFutureDays($startDate, $dateList, "Y-m-d");
// Result: 4 (March 12, 13, 14, 15)
```

### Using String Dates

```php
use D34dman\ConsecutiveDate\ConsecutiveDateStrings;

// Array of date strings
$dateStrings = [
    "2024-03-15",
    "2024-03-14",
    "2024-03-13",
    "2024-03-12"
];

$currentDate = new DateTime("2024-03-15");
$consecutiveDays = ConsecutiveDateStrings::countPastDays($currentDate, $dateStrings, "Y-m-d");
// Result: 4
```

### Custom Date Formats

```php
// Using different date format
$dateStrings = [
    "15/03/2024",
    "14/03/2024",
    "13/03/2024"
];

$currentDate = new DateTime("15/03/2024");
$consecutiveDays = ConsecutiveDateStrings::countPastDays($currentDate, $dateStrings, "d/m/Y");
// Result: 3
```

## API Reference

### ConsecutiveDate Class

#### `countPastDays(DateTimeInterface $date, array $list, string $date_format): int`
Counts consecutive days backwards from the given date.

- `$date`: The reference date to start counting from
- `$list`: Array of DateTime objects
- `$date_format`: Format string for date comparison (e.g., "Y-m-d")

#### `countFutureDays(DateTimeInterface $date, array $list, string $date_format): int`
Counts consecutive days forwards from the given date.

- Parameters are same as `countPastDays()`

### ConsecutiveDateStrings Class

Has the same methods as `ConsecutiveDate` but works with string dates instead of DateTime objects.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

- **Shibin Das** - [d34dman](https://github.com/d34dman)
- Email: shibinkidd@gmail.com

## Support

If you encounter any problems or have suggestions, please [open an issue](https://github.com/d34dman/consecutive-date/issues) on GitHub.
