#!/usr/bin/env php
<?php
foreach (file(__DIR__ . '/source.txt') as $line) {
  $line = trim($line);
  if (!$line) {
    continue;
  }
  if (preg_match('/^(\d+)\. +([А-Я ]+.*)/', $line, $matches)) {
    $number = sprintf("%02d", $matches[1]);
    $file   = __DIR__ . '/../_instructions/' . $number . '.md';
    $title  = mb_strtolower($matches[2]);
    $title  = mb_ucfirst($title);
    $correct = [
      'Святую Троицу',
      'Богородицу',
      'Крест Христов',
      'святым Небесным',
      'Божии',
      'Страшного Суда',
      ' Бога ',
      ' Богу ',
    ];
    $title = str_replace(array_map('mb_strtolower', $correct), $correct, $title);
    file_put_contents($file, "---\n");
    file_put_contents($file, "title: \"$title\"\n", FILE_APPEND);
    file_put_contents($file, "---\n", FILE_APPEND);
  } else {
    file_put_contents($file, "\n$line", FILE_APPEND);
  }
}

function mb_ucfirst($input) {
  return mb_strtoupper(mb_substr($input, 0, 1)) . mb_substr($input, 1);
}
