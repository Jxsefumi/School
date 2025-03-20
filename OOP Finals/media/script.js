//audio
const tracks = [
    { file: "./1.mp3", name: "Taylor Swift - You're Losing Me" },
    { file: "./2.mp3", name: "Taylor Swift - Anti-Hero" },
    { file: "./3.mp3", name: "Taylor Swift - Don’t Blame Me" },
    { file: "./4.mp3", name: "Taylor Swift - Cruel Summer" },
    { file: "./5.mp3", name: "Taylor Swift - Back To December (Taylor's Version)" },
  ];
  let currentTrack = 0;
  const audioPlayer = new Audio(tracks[currentTrack].file);
  
  audioPlayer.addEventListener("timeupdate", () => {
    const progressBar = $(".progress-bar");
    const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    progressBar.css("width", progress + "%");
  });
  
  audioPlayer.addEventListener("ended", () => {
    $("#next").trigger("click");
  });
  
  function updateNowPlaying() {
    $(".now-playing").text(tracks[currentTrack].name);
  }
  
  updateNowPlaying();
  
  $("#play-pause").click(() => {
    if (audioPlayer.paused) {
      audioPlayer.play();
      $("#play-icon").hide();
      $("#pause-icon").show();
    } else {
      audioPlayer.pause();
      $("#play-icon").show();
      $("#pause-icon").hide();
    }
  });
  
  $("#next").click(() => {
    currentTrack = (currentTrack + 1) % tracks.length;
    audioPlayer.src = tracks[currentTrack].file;
    audioPlayer.play();
    updateNowPlaying();
  });
  
  $("#prev").click(() => {
    currentTrack = (currentTrack - 1 + tracks.length) % tracks.length;
    audioPlayer.src = tracks[currentTrack].file;
    audioPlayer.play();
    updateNowPlaying();
  });
  
  function seek(event) {
    const progressBar = $(".progress-bar");
    const progressContainer = $(".progress-container");
    const offsetX = event.pageX - progressContainer.offset().left;
    const seekPercentage = offsetX / progressContainer.width();
    const seekTime = audioPlayer.duration * seekPercentage;
  
    audioPlayer.currentTime = seekTime;
    progressBar.css("width", seekPercentage * 100 + "%");
  }