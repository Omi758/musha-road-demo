/**
 * ビューポートの設定を切り替え
 * 画面の幅が380px未満の場合：ビューポートを380pxに固定
 * それ以上の場合：デバイスの幅に基づいてビューポートを設定
 */
const switchViewport = () => {
  // ビューポート要素を取得
  const viewportMeta = document.querySelector('meta[name="viewport"]');

  // 条件に基づいて適用するビューポートの設定を決定
  const viewportContent =
    window.outerWidth > 380
      ? "width=device-width, initial-scale=1"
      : "width=380";

  // ビューポート要素が存在しない場合はreturn
  if (!viewportMeta) return;

  // 現在のビューポートの設定が目的の設定と異なる場合にのみ、新しい設定を適用します。
  if (viewportMeta.getAttribute("content") !== viewportContent) {
    viewportMeta.setAttribute("content", viewportContent);
  }
};
switchViewport();
window.addEventListener("resize", switchViewport);

/**
 * 検索画面
 */
const modal = () => {
  const modal = document.querySelector(".js-modal");
  const modalBg = document.querySelector(".js-modal-bg");
  const modalContents = document.querySelector(".js-modal-contents");
  const button = document.querySelector(".js-search-open-button");
  const closeButton = document.querySelector(".js-close-button");

  // コンテンツ Opening Keyframe
  const contentsOpeningKeyframes = {
    opacity: [0, 1],
    transform: ["scale(0.98)", "scale(1)"],
  };

  // 背景 Opening Keyframe
  const bgOpeningKeyframes = {
    opacity: [0, 1],
  };

  // コンテンツ Opening Option
  const contentsOpeningOptions = {
    duration: 300,
    easing: "ease-out",
    fill: "forwards",
  };

  // 背景 Opening Option
  const bgOpeningOptions = {
    duration: 150,
    easing: "ease-out",
    fill: "forwards",
  };

  // コンテンツ closing Keyframe
  const contentsClosingKeyframes = {
    opacity: [1, 0],
    transform: ["scale(1)", "scale(0.98)"],
  };

  // 背景 closing Keyframe
  const bgClosingKeyframes = {
    opacity: [1, 0],
  };

  // コンテンツ Opening Option
  const contentsClosingOptions = {
    duration: 300,
    easing: "ease-out",
    fill: "forwards",
  };

  // 背景 Opening Option
  const bgClosingOptions = {
    duration: 150,
    easing: "ease-out",
    fill: "forwards",
  };

  // モーダルとボタンがない場合はreturnする
  if (!modal || !button) return;

  // モーダルOpenする関数
  const openModal = () => {
    modal.showModal();
    modalContents.animate(contentsOpeningKeyframes, contentsOpeningOptions);
    modalBg.style.display = "block";
    modalBg.animate(bgOpeningKeyframes, bgOpeningOptions);
  };

  // モーダルcloseする関数
  const closeModal = () => {
    const closingAnim = modalContents.animate(
      contentsClosingKeyframes,
      contentsClosingOptions
    );
    modalBg.animate(bgClosingKeyframes, bgClosingOptions);

    // アニメの完了後
    closingAnim.onfinish = () => {
      modal.close();
      modalBg.style.display = "none";
    };
  };

  // ボタンクリックでモーダルopen
  button.addEventListener("click", () => {
    openModal();
  });

  // クローズボタンクリックでモーダルclose
  closeButton.addEventListener("click", () => {
    closeModal();
  });

  // 背景クリックでモーダルclose
  modal.addEventListener("click", (event) => {
    if (event.target.closest(".js-modal-contents") === null) {
      closeModal();
    }
  });

  // escapeキーを押すと非表示
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      event.preventDefault();
      closeModal();
    }
  });
};

modal();
