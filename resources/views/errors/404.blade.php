<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR 404 - LOST IN THE COSMIC VOID</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Mono', monospace;
            background: #0a0a0a url('outer_space_background.png') no-repeat center center fixed;
            background-size: cover;
            color: #00ffff;
            overflow: hidden;
            height: 100vh;
            cursor: crosshair;
        }

        .glitch-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Background static effect (now subtle cosmic dust/flicker) */
        .static-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(0, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 0, 255, 0.05) 0%, transparent 50%);
            animation: cosmicFlicker 0.2s infinite;
            z-index: 1;
        }

        @keyframes cosmicFlicker {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.3; }
        }

        /* Main content */
        .main-content {
            position: relative;
            z-index: 2;
            width: 90%;
            max-width: 800px;
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.5);
        }

        /* Ship's Log terminal */
        .system-message {
            background: rgba(0, 0, 0, 0.8);
            border: 2px solid #00ffff;
            border-radius: 8px;
            margin-bottom: 40px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
            animation: terminalGlow 2s ease-in-out infinite alternate;
        }

        @keyframes terminalGlow {
            from { box-shadow: 0 0 20px rgba(0, 255, 255, 0.3); }
            to { box-shadow: 0 0 30px rgba(0, 255, 255, 0.5); }
        }

        .terminal-header {
            background: #1a1a1a;
            padding: 10px;
            border-bottom: 1px solid #00ffff;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .terminal-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .terminal-dot.red { background: #ff5555; }
        .terminal-dot.yellow { background: #ffff55; }
        .terminal-dot.green { background: #55ff55; }

        .terminal-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 10px;
            color: #00ffff;
            margin-left: auto;
        }

        .terminal-body {
            padding: 20px;
            text-align: left;
        }

        .terminal-body p {
            margin-bottom: 10px;
            font-size: 18px;
            line-height: 1.4;
        }

        .glitch-text {
            color: #ff0080;
            animation: glitchText 1s infinite;
            font-weight: bold;
        }

        @keyframes glitchText {
            0%, 100% { 
                transform: translate(0);
                filter: hue-rotate(0deg);
            }
            20% { 
                transform: translate(-2px, 2px);
                filter: hue-rotate(90deg);
            }
            40% { 
                transform: translate(-2px, -2px);
                filter: hue-rotate(180deg);
            }
            60% { 
                transform: translate(2px, 2px);
                filter: hue-rotate(270deg);
            }
            80% { 
                transform: translate(2px, -2px);
                filter: hue-rotate(360deg);
            }
        }

        .status-text {
            color: #ffff00;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0.3; }
        }

        .user-text {
            color: #00ff00;
        }

        .recal-text {
            color: #ff8800;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Stellar anomalies */
        .data-fragments {
            position: relative;
            height: 200px;
            margin: 40px 0;
        }

        .fragment {
            position: absolute;
            font-size: 16px;
            color: #666;
            cursor: pointer;
            padding: 5px 10px;
            border: 1px solid #333;
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            animation: fragmentFloat 3s ease-in-out infinite;
            border-radius: 5px;
        }

        .fragment:hover {
            color: #00ffff;
            border-color: #00ffff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            transform: scale(1.1);
        }

        .fragment.stabilized {
            color: #00ffff;
            border-color: #00ffff;
            animation: stabilize 0.5s ease;
        }

        @keyframes stabilize {
            0% { 
                filter: blur(5px);
                transform: scale(0.8);
            }
            100% { 
                filter: blur(0);
                transform: scale(1);
            }
        }

        @keyframes fragmentFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Fragment positioning */
        .fragment-1 { top: 20px; left: 10%; animation-delay: 0s; }
        .fragment-2 { top: 60px; right: 15%; animation-delay: 0.5s; }
        .fragment-3 { top: 100px; left: 20%; animation-delay: 1s; }
        .fragment-4 { top: 140px; right: 25%; animation-delay: 1.5s; }
        .fragment-5 { top: 40px; left: 50%; animation-delay: 2s; }
        .fragment-6 { top: 120px; right: 45%; animation-delay: 2.5s; }
        .fragment-7 { top: 80px; left: 70%; animation-delay: 3s; }
        .fragment-8 { top: 160px; left: 40%; animation-delay: 3.5s; }

        /* Navigational Console section */
        .recalibration-section {
            margin-top: 40px;
        }

        .recalibrate-button {
            font-family: 'Orbitron', sans-serif;
            font-size: 14px;
            padding: 15px 30px;
            background: transparent;
            border: 2px solid #666;
            color: #666;
            cursor: not-allowed;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 5px;
        }

        .recalibrate-button.glitched {
            animation: buttonGlitch 2s infinite;
        }

        @keyframes buttonGlitch {
            0%, 100% { 
                transform: translate(0);
                filter: hue-rotate(0deg);
            }
            25% { 
                transform: translate(-1px, 1px);
                filter: hue-rotate(90deg);
            }
            50% { 
                transform: translate(1px, -1px);
                filter: hue-rotate(180deg);
            }
            75% { 
                transform: translate(-1px, -1px);
                filter: hue-rotate(270deg);
            }
        }

        .recalibrate-button.active {
            border-color: #00ffff;
            color: #00ffff;
            cursor: pointer;
            animation: none;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
        }

        .recalibrate-button.active:hover {
            background: rgba(0, 255, 255, 0.1);
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.5);
        }

        .progress-indicator {
            width: 300px;
            height: 4px;
            background: #333;
            margin: 20px auto;
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #00ffff, #00ff00);
            width: 0%;
            transition: width 0.5s ease;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        /* Debug console */
        .debug-console {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.8);
            border: 1px solid #333;
            padding: 10px;
            font-size: 12px;
            color: #666;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 5px;
        }

        .debug-console.visible {
            opacity: 1;
        }

        .debug-line {
            margin-bottom: 5px;
        }

        /* Glitch overlay (now warp effect) */
        .glitch-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 3;
            background: linear-gradient(
                90deg,
                transparent 0%,
                rgba(255, 0, 128, 0.03) 50%,
                transparent 100%
            );
            animation: warpEffect 4s infinite;
        }

        @keyframes warpEffect {
            0%, 100% { transform: scaleX(1); opacity: 0; }
            50% { transform: scaleX(1.1); opacity: 0.2; }
        }

        /* Scanlines (now subtle star twinkle) */
        .scanlines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 4;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(255, 255, 255, 0.03) 2px,
                rgba(255, 255, 255, 0.03) 4px
            );
            animation: starTwinkle 0.5s linear infinite;
        }

        @keyframes starTwinkle {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .terminal-body p {
                font-size: 14px;
            }
            
            .recalibrate-button {
                font-size: 10px;
                padding: 12px 20px;
            }
            
            .fragment {
                font-size: 14px;
            }
            
            .data-fragments {
                height: 150px;
            }
        }

        /* System reboot animation (now hyperjump) */
        @keyframes hyperjump {
            0% { 
                filter: brightness(1);
                transform: scale(1);
            }
            50% { 
                filter: brightness(3) contrast(2);
                transform: scale(1.05);
            }
            100% { 
                filter: brightness(0);
                transform: scale(0.95);
            }
        }

        .system-reboot {
            animation: hyperjump 1s ease-in-out;
        }

        /* New styles for enhanced elements */
        .ai-message {
            color: #00ff00;
            font-family: 'Space Mono', monospace;
            font-size: 16px;
            margin-bottom: 20px;
            text-align: center;
            animation: aiTextFade 3s ease-in-out;
        }

        @keyframes aiTextFade {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .stellar-conduit {
            position: absolute;
            width: 80px; /* Adjust size as needed */
            height: 80px; /* Adjust size as needed */
            background-image: url('stellar_conduit_1.png'); /* Use the generated image */
            background-size: contain;
            background-repeat: no-repeat;
            cursor: pointer;
            animation: conduitFlicker 1s infinite alternate;
            transition: transform 0.3s ease-in-out;
        }

        .stellar-conduit:hover {
            transform: scale(1.2);
            filter: brightness(1.5);
        }

        .stellar-conduit.stabilized {
            animation: none;
            filter: brightness(1);
            box-shadow: 0 0 15px #00ffff;
        }

        @keyframes conduitFlicker {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }

        /* Positions for stellar conduits */
        .conduit-1 { top: 10%; left: 15%; }
        .conduit-2 { top: 30%; right: 20%; }
        .conduit-3 { top: 50%; left: 30%; }
        .conduit-4 { top: 70%; right: 10%; }
        .conduit-5 { top: 20%; left: 60%; }
        .conduit-6 { top: 40%; right: 5%; }
        .conduit-7 { top: 60%; left: 5%; }
        .conduit-8 { top: 80%; right: 30%; }

        .debris {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: debrisDrift linear infinite;
            pointer-events: none;
        }

        @keyframes debrisDrift {
            from { transform: translate(0, 0); opacity: 1; }
            to { transform: translate(100vw, 100vh); opacity: 0; }
        }

        .radiation-burst {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 0, 255, 0.2);
            animation: radiationPulse 0.5s ease-out;
            opacity: 0;
            pointer-events: none;
            z-index: 5;
        }

        @keyframes radiationPulse {
            0% { opacity: 0; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 0; transform: scale(1); }
        }

    </style>
</head>
<body>
    <div class="glitch-container">
        <!-- Background cosmic dust/flicker -->
        <div class="static-bg"></div>
        
        <!-- Main content -->
        <div class="main-content">
            <!-- AI Companion Message -->
            <p id="ai-companion-message" class="ai-message">[AI_UNIT_07: DISTRESS SIGNAL INITIATED. UNKNOWN SECTOR. PRIMARY SYSTEMS OFFLINE. NAVIGATIONAL ARRAY COMPROMISED. PILOT, YOUR ASSISTANCE IS CRUCIAL. LOCATE AND RECALIBRATE THE STELLAR CONDUITS TO REGAIN CONTROL.]</p>

            <!-- Ship's Log message -->
            <div class="system-message">
                <div class="terminal-header">
                    <span class="terminal-dot red"></span>
                    <span class="terminal-dot yellow"></span>
                    <span class="terminal-dot green"></span>
                    <span class="terminal-title">SHIP'S LOG</span>
                </div>
                <div class="terminal-body">
                    <p id="error-message" class="glitch-text">ERROR 404: UNKNOWN SECTOR DETECTED</p>
                    <p id="status-message" class="status-text">NAVIGATIONAL BEACON LOST...</p>
                    <p id="user-message" class="user-text">ATTEMPTING TO RE-ESTABLISH CONTACT</p>
                    <p id="recalibration-message" class="recal-text">PLEASE ASSIST IN RECALIBRATING SENSORS...</p>
                </div>
            </div>

            <!-- Stellar Conduits scattered around -->
            <div class="data-fragments">
                <div class="stellar-conduit conduit-1" data-fragment="ENGINE"></div>
                <div class="stellar-conduit conduit-2" data-fragment="SHIELD"></div>
                <div class="stellar-conduit conduit-3" data-fragment="COMMS"></div>
                <div class="stellar-conduit conduit-4" data-fragment="NAVIGATION"></div>
                <div class="stellar-conduit conduit-5" data-fragment="WEAPONS"></div>
                <div class="stellar-conduit conduit-6" data-fragment="LIFE_SUPPORT"></div>
                <div class="stellar-conduit conduit-7" data-fragment="POWER"></div>
                <div class="stellar-conduit conduit-8" data-fragment="SENSORS"></div>
            </div>

            <!-- Navigational Console button -->
            <div class="recalibration-section">
                <button id="recalibrate-btn" class="recalibrate-button glitched" disabled>
                    [INITIATE HYPERJUMP]
                </button>
                <div class="progress-indicator">
                    <div class="progress-bar" id="progress-bar"></div>
                </div>
            </div>

            <!-- Debug console (hidden initially) -->
            <div class="debug-console" id="debug-console">
                <div class="debug-line">DEBUG: Stellar anomaly detected</div>
                <div class="debug-line">DEBUG: Navigational systems stabilizing...</div>
            </div>
        </div>

        <!-- Warp effect overlay -->
        <div class="glitch-overlay"></div>
        
        <!-- Star twinkle effect -->
        <div class="scanlines"></div>

        <!-- Radiation burst effect -->
        <div class="radiation-burst" id="radiation-burst"></div>
    </div>

    <script>
        class GlitchSystem {
            constructor() {
                this.fragmentsInteracted = 0;
                this.totalFragments = 8;
                this.isRecalibrated = false;
                this.debugMessages = [
                    "DEBUG: Stellar anomaly detected",
                    "DEBUG: Navigational systems stabilizing...",
                    "DEBUG: Warp core re-engaging",
                    "DEBUG: FTL drive charging",
                    "DEBUG: Pilot input acknowledged",
                    "DEBUG: Hyperjump sequence ready",
                    "DEBUG: Destination coordinates locked"
                ];
                this.aiMessages = [
                    "[AI_UNIT_07: DISTRESS SIGNAL INITIATED. UNKNOWN SECTOR. PRIMARY SYSTEMS OFFLINE. NAVIGATIONAL ARRAY COMPROMISED. PILOT, YOUR ASSISTANCE IS CRUCIAL. LOCATE AND RECALIBRATE THE STELLAR CONDUITS TO REGAIN CONTROL.]",
                    "[AI_UNIT_07: CONDUIT RECALIBRATED. ONE STEP CLOSER TO HOME.]",
                    "[AI_UNIT_07: SYSTEMS RESPONDING. KEEP IT UP, PILOT.]",
                    "[AI_UNIT_07: DATA FLOW OPTIMIZED. ALMOST THERE.]",
                    "[AI_UNIT_07: NAVIGATIONAL CONSOLE ONLINE. HYPERJUMP SEQUENCE READY.]"
                ];
                
                this.init();
            }
            
            init() {
                this.setupFragmentInteractions();
                this.setupRecalibrationButton();
                this.startSystemMessages();
                this.addKeyboardListeners();
                this.startEnvironmentalHazards();
            }
            
            setupFragmentInteractions() {
                const fragments = document.querySelectorAll(".stellar-conduit");
                
                fragments.forEach((fragment, index) => {
                    fragment.addEventListener("click", () => {
                        this.handleFragmentClick(fragment, index);
                    });
                    
                    fragment.addEventListener("mouseenter", () => {
                        this.handleFragmentHover(fragment);
                    });
                    fragment.addEventListener("mouseleave", () => {
                        this.handleFragmentLeave(fragment);
                    });
                });
            }
            
            handleFragmentClick(fragment, index) {
                if (fragment.classList.contains("stabilized")) return;
                
                // Visual feedback
                fragment.classList.add("stabilized");
                
                // Trigger localized warp effect
                this.triggerLocalizedWarp(fragment);
                
                // Update system state
                this.fragmentsInteracted++;
                this.updateProgress();
                this.showDebugMessage();
                this.updateSystemMessages();
                
                // Play interaction sound (visual feedback instead)
                this.createLightPingEffect(fragment);
            }
            
            handleFragmentHover(fragment) {
                if (fragment.classList.contains("stabilized")) return;
                
                // Show original text briefly (simulated by changing background image or adding text)
                // For now, we'll just make it glow more intensely
                fragment.style.filter = "brightness(2.0)";
            }

            handleFragmentLeave(fragment) {
                if (fragment.classList.contains("stabilized")) return;
                fragment.style.filter = "brightness(1.0)";
            }
            
            updateProgress() {
                const progressBar = document.getElementById("progress-bar");
                const progress = (this.fragmentsInteracted / this.totalFragments) * 100;
                progressBar.style.width = `${progress}%`;
                
                // Update button state
                const recalibrateBtn = document.getElementById("recalibrate-btn");
                if (this.fragmentsInteracted >= 5 && !this.isRecalibrated) {
                    recalibrateBtn.classList.remove("glitched");
                    recalibrateBtn.classList.add("active");
                    recalibrateBtn.disabled = false;
                    recalibrateBtn.textContent = "[INITIATE HYPERJUMP]";
                    document.getElementById("ai-companion-message").textContent = this.aiMessages[4];
                }
            }
            
            showDebugMessage() {
                const debugConsole = document.getElementById("debug-console");
                const messageIndex = Math.min(this.fragmentsInteracted - 1, this.debugMessages.length - 1);
                
                if (messageIndex >= 0) {
                    debugConsole.classList.add("visible");
                    const debugLines = debugConsole.querySelectorAll(".debug-line");
                    debugLines[0].textContent = this.debugMessages[messageIndex];
                    debugLines[1].textContent = `DEBUG: Anomalies stabilized: ${this.fragmentsInteracted}/${this.totalFragments}`;
                }
            }
            
            updateSystemMessages() {
                const statusMessage = document.getElementById("status-message");
                const userMessage = document.getElementById("user-message");
                const recalMessage = document.getElementById("recalibration-message");
                const aiCompanionMessage = document.getElementById("ai-companion-message");

                if (this.fragmentsInteracted === 1) {
                    aiCompanionMessage.textContent = this.aiMessages[1];
                } else if (this.fragmentsInteracted === 2) {
                    aiCompanionMessage.textContent = this.aiMessages[2];
                } else if (this.fragmentsInteracted === 3) {
                    aiCompanionMessage.textContent = this.aiMessages[3];
                }

                if (this.fragmentsInteracted >= 2) {
                    statusMessage.textContent = "WARP CORE RE-ENGAGING...";
                }
                
                if (this.fragmentsInteracted >= 4) {
                    userMessage.textContent = "PILOT INPUT STABILIZING SYSTEMS";
                    userMessage.style.color = "#00ff00";
                }
                
                if (this.fragmentsInteracted >= 5) {
                    recalMessage.textContent = "HYPERJUMP SEQUENCE READY - DESTINATION LOCKED";
                    recalMessage.style.color = "#00ff00";
                }
            }
            
            setupRecalibrationButton() {
                const recalibrateBtn = document.getElementById("recalibrate-btn");
                
                recalibrateBtn.addEventListener("click", () => {
                    if (!recalibrateBtn.disabled && !this.isRecalibrated) {
                        this.performHyperjump();
                    }
                });
            }
            
            performHyperjump() {
                this.isRecalibrated = true;
                const container = document.querySelector(".glitch-container");
                
                // Hyperjump sequence
                container.classList.add("system-reboot"); // Reusing class for animation
                
                // Update system messages
                document.getElementById("error-message").textContent = "HYPERJUMP INITIATED";
                document.getElementById("status-message").textContent = "TRAVERSING COSMIC PATHWAYS...";
                document.getElementById("user-message").textContent = "THANK YOU, PILOT";
                document.getElementById("recalibration-message").textContent = "WELCOME HOME!";
                
                // Redirect after animation
                setTimeout(() => {
                    // In a real scenario, redirect to homepage
                    // window.location.href = "/";
                    
                    // For demo purposes, show completion message
                    this.showCompletionMessage();
                }, 2000);
            }
            
            showCompletionMessage() {
                const container = document.querySelector(".glitch-container");
                container.innerHTML = `
                    <div style="text-align: center; color: #00ffff; font-family: 'Orbitron', sans-serif;">
                        <h1 style="font-size: 24px; margin-bottom: 20px;">DESTINATION REACHED</h1>
                        <p style="font-size: 14px; margin-bottom: 30px;">Thank you for navigating the cosmic void!</p>
                        <button onclick="location.reload()" style="
                            font-family: 'Orbitron', sans-serif;
                            font-size: 12px;
                            padding: 15px 30px;
                            background: transparent;
                            border: 2px solid #00ffff;
                            color: #00ffff;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            border-radius: 5px;
                        " onmouseover="this.style.background='rgba(0,255,255,0.1)'" 
                           onmouseout="this.style.background='transparent'">
                            [RE-ENTER ORBIT]
                        </button>
                    </div>
                `;
            }
            
            triggerLocalizedWarp(element) {
                const overlay = document.createElement('div');
                overlay.classList.add('radiation-burst');
                document.body.appendChild(overlay);

                setTimeout(() => {
                    overlay.remove();
                }, 500);
            }
            
            createLightPingEffect(element) {
                const ripple = document.createElement("div");
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(0, 255, 255, 0.3);
                    transform: scale(0);
                    animation: lightPing 0.6s linear;
                    pointer-events: none;
                    z-index: 10;
                `;
                
                const rect = element.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                ripple.style.width = ripple.style.height = size + "px";
                ripple.style.left = (rect.left + rect.width / 2 - size / 2) + "px";
                ripple.style.top = (rect.top + rect.height / 2 - size / 2) + "px";
                
                document.body.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
                
                // Add lightPing animation
                const style = document.createElement("style");
                style.textContent = `
                    @keyframes lightPing {
                        to {
                            transform: scale(4);
                            opacity: 0;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
            
            startSystemMessages() {
                // Randomly update system messages to simulate active system
                setInterval(() => {
                    if (!this.isRecalibrated && Math.random() < 0.3) {
                        const messages = [
                            "SCANNING FOR NAVIGATIONAL BEACONS...",
                            "ANALYZING STELLAR DATA...",
                            "DETECTING LIFE SIGNS...",
                            "MONITORING SHIP INTEGRITY..."
                        ];
                        
                        const randomMessage = messages[Math.floor(Math.random() * messages.length)];
                        document.getElementById("recalibration-message").textContent = randomMessage;
                        
                        setTimeout(() => {
                            if (this.fragmentsInteracted < 5) {
                                document.getElementById("recalibration-message").textContent = "PLEASE ASSIST IN RECALIBRATING SENSORS...";
                            }
                        }, 2000);
                    }
                }, 5000);
            }
            
            addKeyboardListeners() {
                // Easter egg: Konami code or special key combinations
                let keySequence = [];
                const konamiCode = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "KeyB", "KeyA"];
                
                document.addEventListener("keydown", (e) => {
                    keySequence.push(e.code);
                    
                    if (keySequence.length > konamiCode.length) {
                        keySequence.shift();
                    }
                    
                    if (keySequence.length === konamiCode.length && 
                        keySequence.every((key, index) => key === konamiCode[index])) {
                        this.activateEasterEgg();
                    }
                });
            }
            
            activateEasterEgg() {
                // Special easter egg effect
                const body = document.body;
                body.style.animation = "rainbow 2s infinite";
                
                const style = document.createElement("style");
                style.textContent = `
                    @keyframes rainbow {
                        0% { filter: hue-rotate(0deg); }
                        100% { filter: hue-rotate(360deg); }
                    }
                `;
                document.head.appendChild(style);
                
                // Show special message
                const debugConsole = document.getElementById("debug-console");
                debugConsole.classList.add("visible");
                debugConsole.innerHTML = `
                    <div class="debug-line">DEBUG: COSMIC CODE DETECTED</div>
                    <div class="debug-line">DEBUG: NEBULA MODE ACTIVATED</div>
                    <div class="debug-line">DEBUG: YOU ARE A MASTER NAVIGATOR!</div>
                `;
                
                setTimeout(() => {
                    body.style.animation = "";
                }, 10000);
            }

            startEnvironmentalHazards() {
                // Drifting debris
                setInterval(() => {
                    if (!this.isRecalibrated) {
                        this.createDebris();
                    }
                }, 1000);

                // Cosmic Radiation Bursts
                setInterval(() => {
                    if (!this.isRecalibrated && Math.random() < 0.05) { // 5% chance every 10 seconds
                        this.triggerRadiationBurst();
                    }
                }, 10000);
            }

            createDebris() {
                const debris = document.createElement('div');
                debris.classList.add('debris');
                const size = Math.random() * 5 + 2; // 2-7px
                debris.style.width = `${size}px`;
                debris.style.height = `${size}px`;
                debris.style.left = `${Math.random() * 100}vw`;
                debris.style.top = `${Math.random() * 100}vh`;
                debris.style.animationDuration = `${Math.random() * 20 + 10}s`; // 10-30s
                document.body.appendChild(debris);

                setTimeout(() => {
                    debris.remove();
                }, parseFloat(debris.style.animationDuration) * 1000);
            }

            triggerRadiationBurst() {
                const radiationBurst = document.getElementById('radiation-burst');
                radiationBurst.style.animation = 'none';
                radiationBurst.offsetHeight; // Trigger reflow
                radiationBurst.style.animation = 'radiationPulse 0.5s ease-out';
            }
        }

        // Initialize the system when DOM is loaded
        document.addEventListener("DOMContentLoaded", () => {
            new GlitchSystem();
        });

        // Add some ambient effects
        document.addEventListener("mousemove", (e) => {
            const cursor = e.target;
            if (cursor.classList && cursor.classList.contains("stellar-conduit")) {
                document.body.style.cursor = "pointer";
            } else {
                document.body.style.cursor = "crosshair";
            }
        });

        // Prevent right-click context menu for immersion
        document.addEventListener("contextmenu", (e) => {
            e.preventDefault();
        });

        // Add random cosmic flicker effects
        setInterval(() => {
            if (Math.random() < 0.1) {
                const staticBg = document.querySelector(".static-bg");
                staticBg.style.opacity = Math.random() * 0.5 + 0.3;
                
                setTimeout(() => {
                    staticBg.style.opacity = "";
                }, 100);
            }
        }, 2000);
    </script>
</body>
</html>

