# 🧩 Matsuyama Clinic – Web Coding Demo（架空サイト）

![musha-road-demo demo-site](/assets/img/musha-road_git_screenshot.webp "musha-road-demo demo-site")

## 🔗 Demo

（仮想 URL）
[https://omi758.github.io/matsuyama-clinic-demo/](https://omi758.github.io/matsuyama-clinic-demo/)

&nbsp;

## 📝 Overview（概要）

HelloMentor 課題で制作した医療系クリニックの架空リクルーティングサイト（静的コーディング）です。

- リキッドレイアウトを採用

- BEM に基づく CSS 設計で保守性の高いコーディング

- GSAP を使用したハンバーガーメニューのモーダルアニメーション

- レスポンシブ対応（SP / PC）

- UI/UX を意識したアニメーション・ボタンデザイン

- 実務を想定して「読みやすさ・保守性・再利用性」を重視した構成

&nbsp;

## 🛠️ Tech Stack（使用技術）

<p align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="40" alt="HTML5" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="40" alt="CSS3" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg" width="40" alt="SCSS" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" width="40" alt="JavaScript" />
  <img src="https://img.shields.io/badge/GSAP-88CE02?style=for-the-badge&logo=greensock&logoColor=black" width="60" alt="GSAP" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-original.svg" width="50" alt="WordPress" />
   <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" width="50" alt="PHP" />
</p>

&nbsp;

## ✨ Features（制作ポイント）

### 1. ハンバーガーメニューを GSAP でアニメーション

- モーダルのフェードイン・フェードアウト
- ユーザー操作に応じた閉じ処理（クリック・リンク選択・エスケープキー押下 等）

### 2. BEM ベースの CSS 設計 と 保守性の高い ES Modules を採用した構成

- 読みやすい class 命名と SCSS のファイル分割
- ES Modules を使用してスクリプトの保守性を向上

### 3. レスポンシブ対応

- SP / PC 双方で閲覧性を意識した余白・タイポグラフィ調整

### 4. CSS アニメーションを使用した UI 効果

- ホバー時のボタンアニメーション

  &nbsp;

## 📂 Directory（主な構成）

```text
.
└── index.html
    ├── css
    │   └── style.css
    │   └── style.css.map
    ├── img
    ├── js
    │   └── main.js
    │   └── component
    │   │   └── hamburgermenu.js
    │   │   └── smoothscroll.js
    │   └── utility
    │       └── viewport.js
    └── scss
        ├── component
        ├── foundation
        ├── global
        ├── layout
        ├── page
        ├── utility
        └── style.scss
```
